<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // Melindungi kolom 'id' dari mass assignment, kolom lain bebas diisi
    protected $guarded = ['id'];

    // Eager Loading: Otomatis load relasi author dan category saat query Post
    protected $with = ['user', 'category'];

    // Relasi Many-to-One: Post ditulis oleh satu User (author)
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Alias untuk backward compatibility dengan views yang menggunakan user()
    public function user(): BelongsTo
    {
        return $this->author();
    }

    // Relasi Many-to-One: Post masuk dalam satu Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Query Scope: Filter pencarian berdasarkan search, category, atau author
    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) => $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) => $query->whereHas('category', fn($query) =>
                $query->where('name', $category)
            )
        );

        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) => $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }
}