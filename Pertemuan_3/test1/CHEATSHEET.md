# 🚀 Laravel Quick Cheatsheet

Quick reference untuk command dan code yang sering digunakan.

---

## ⚡ Setup Commands (Copy-Paste)

```bash
# Full setup dari awal
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

---

## 🔄 Reset Everything

```bash
# Reset database & cache
php artisan migrate:fresh --seed
php artisan optimize:clear
php artisan storage:link
```

---

## 🧹 Clear Cache

```bash
# Clear semua cache
php artisan optimize:clear

# Atau satu per satu:
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## 🗄️ Database Commands

```bash
# Fresh migration + seed
php artisan migrate:fresh --seed

# Rollback last migration
php artisan migrate:rollback

# Run specific seeder
php artisan db:seed --class=DatabaseSeeder
```

---

## 🔍 Debugging

```bash
# Open tinker (interactive shell)
php artisan tinker

# In tinker:
User::all()
Post::with('user')->first()
DB::enableQueryLog()
DB::getQueryLog()
```

---

## 📝 Create New Files

```bash
# Controller
php artisan make:controller NameController

# Resource Controller
php artisan make:controller NameController --resource

# Model + Migration
php artisan make:model ModelName -m

# Model + Migration + Factory + Seeder
php artisan make:model ModelName -mfs

# Policy
php artisan make:policy PolicyName --model=ModelName

# Migration
php artisan make:migration create_table_name

# Factory
php artisan make:factory FactoryName

# Seeder
php artisan make:seeder SeederName
```

---

## 🛣️ Routes

```bash
# List all routes
php artisan route:list

# List specific routes
php artisan route:list --path=dashboard
```

---

## 🔐 Authentication Code

### Login
```php
// LoginController
if (Auth::attempt($credentials)) {
    $request->session()->regenerate();
    return redirect()->intended('/dashboard');
}
```

### Logout
```php
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect('/login');
```

### Check Auth
```php
// In controller
Auth::check()      // true if logged in
Auth::user()       // current user
Auth::id()         // current user id

// In blade
@auth
    // User is logged in
@endauth

@guest
    // User is not logged in
@endguest

{{ Auth::user()->name }}
```

---

## 🗃️ Eloquent Queries

### Basic
```php
// Get all
Post::all()

// Find by ID
Post::find(1)

// Where
Post::where('user_id', 1)->get()

// First
Post::where('title', 'like', '%test%')->first()

// Create
Post::create([...])

// Update
$post->update([...])

// Delete
$post->delete()
```

### With Relations (Eager Loading)
```php
// Eager loading
Post::with(['user', 'category'])->get()

// Lazy eager loading
$post->load(['user', 'category'])

// Nested
Post::with(['user.profile', 'category'])->get()

// With count
Post::withCount('comments')->get()
```

### Pagination
```php
Post::paginate(10)
Post::paginate(10)->withQueryString()  // Keep query params
```

### Scopes
```php
// In model
public function scopeFilter($query, array $filters)
{
    $query->when($filters['search'] ?? false, function ($query, $search) {
        return $query->where('title', 'like', '%' . $search . '%');
    });
}

// Usage
Post::filter(request(['search']))->get()
```

---

## 📤 File Upload

### In Controller
```php
// Validate
$validated = $request->validate([
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
]);

// Store
if ($request->hasFile('image')) {
    $path = $request->file('image')->store('post-images', 'public');
    $validated['image'] = $path;
}

// Delete old
if ($post->image) {
    Storage::disk('public')->delete($post->image);
}
```

### In Blade
```php
<form enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*">
</form>

// Display
<img src="{{ asset('storage/' . $post->image) }}" alt="">
```

---

## ✅ Validation

### In Controller
```php
$validated = $request->validate([
    'title' => 'required|string|max:255',
    'email' => 'required|email|unique:users',
    'password' => 'required|min:8|confirmed',
    'image' => 'nullable|image|max:2048',
], [
    'title.required' => 'Judul harus diisi',
    'email.unique' => 'Email sudah terdaftar',
]);
```

### In Blade
```php
// Display error
@error('title')
    <p class="text-red-600">{{ $message }}</p>
@enderror

// Old input
<input value="{{ old('title') }}">

// Error class
<input class="@error('title') border-red-500 @enderror">
```

---

## 🔐 Authorization

### Policy
```php
// In Policy
public function update(User $user, Post $post): bool
{
    return $user->id === $post->user_id;
}

// In Controller
$this->authorize('update', $post);

// In Blade
@can('update', $post)
    <a href="/posts/{{ $post->id }}/edit">Edit</a>
@endcan
```

---

## 🎨 Blade Directives

### Control Structures
```php
@if($condition)
    // code
@elseif($other)
    // code
@else
    // code
@endif

@foreach($items as $item)
    {{ $item }}
@endforeach

@forelse($items as $item)
    {{ $item }}
@empty
    <p>No items</p>
@endforelse
```

### Authentication
```php
@auth
    // Logged in
@endauth

@guest
    // Not logged in
@endguest

{{ Auth::user()->name }}
```

### CSRF & Method
```php
<form method="POST">
    @csrf
    @method('PUT')  // For update
    @method('DELETE')  // For delete
</form>
```

### Components
```php
// Use component
<x-component-name :prop="$value" />

// In component
{{ $prop }}
{{ $slot }}
```

---

## 🔗 Routes

### Basic
```php
Route::get('/path', [Controller::class, 'method']);
Route::post('/path', [Controller::class, 'method']);
Route::put('/path', [Controller::class, 'method']);
Route::delete('/path', [Controller::class, 'method']);
```

### Resource
```php
Route::resource('posts', PostController::class);

// Generates:
// GET    /posts           index
// GET    /posts/create    create
// POST   /posts           store
// GET    /posts/{id}      show
// GET    /posts/{id}/edit edit
// PUT    /posts/{id}      update
// DELETE /posts/{id}      destroy
```

### Middleware
```php
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Controller::class, 'index']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [Controller::class, 'index']);
});
```

---

## 💾 Session & Flash

```php
// Store in session
session(['key' => 'value']);

// Get from session
session('key');

// Flash message (one-time)
return redirect('/path')->with('success', 'Message');

// In blade
@if(session('success'))
    <div>{{ session('success') }}</div>
@endif
```

---

## 🔍 Debugging

```php
// Dump and die
dd($variable);

// Dump
dump($variable);

// Log
\Log::info('Message', ['data' => $data]);

// Check logs
// storage/logs/laravel.log
```

---

## 📊 Useful Helpers

```php
// String
Str::slug('Hello World')        // hello-world
Str::limit($text, 50)           // Limit to 50 chars

// Array
collect([1, 2, 3])->map(...)    // Collection methods

// URL
url('/path')
route('name')
asset('path/to/file')
asset('storage/image.jpg')

// Date
now()
today()
Carbon::parse($date)->format('d M Y')
```

---

## 🎯 Common Patterns

### Controller CRUD Pattern
```php
public function index()
{
    $items = Model::with('relation')->paginate(10);
    return view('index', compact('items'));
}

public function create()
{
    return view('create');
}

public function store(Request $request)
{
    $validated = $request->validate([...]);
    Model::create($validated);
    return redirect('/path')->with('success', 'Created!');
}

public function show(Model $model)
{
    return view('show', compact('model'));
}

public function edit(Model $model)
{
    return view('edit', compact('model'));
}

public function update(Request $request, Model $model)
{
    $validated = $request->validate([...]);
    $model->update($validated);
    return redirect('/path')->with('success', 'Updated!');
}

public function destroy(Model $model)
{
    $model->delete();
    return redirect('/path')->with('success', 'Deleted!');
}
```

---

## 🚀 Quick Test

```bash
# 1. Start server
php artisan serve

# 2. Open browser
http://localhost:8000/login

# 3. Login
Email: john@example.com
Password: password

# 4. Test CRUD
Create → Edit → Delete
```

---

## 📚 Resources

- Laravel Docs: https://laravel.com/docs
- Tailwind CSS: https://tailwindcss.com/docs
- Laravel Debugbar: https://github.com/barryvdh/laravel-debugbar

---

**Print this and keep it handy! 📄**
