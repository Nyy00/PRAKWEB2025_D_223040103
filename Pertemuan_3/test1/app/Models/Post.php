<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'published_at',
        'user_id',
        'category_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Relasi Many to One: Post dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Many to One: Post dimiliki oleh satu Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Scope untuk search
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%');
        });
    }
}
