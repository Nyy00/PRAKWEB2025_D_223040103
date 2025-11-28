<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Tips Memulai Belajar Pemrograman Web untuk Pemula',
            'Panduan Lengkap Laravel untuk Pengembangan Website Modern',
            'Cara Membuat Blog Responsif dengan Tailwind CSS',
            'Mengenal Framework PHP Terpopuler di Indonesia',
            'Tutorial Membuat Aplikasi CRUD dengan Laravel',
            'Best Practice dalam Pengembangan Web Application',
            'Optimasi Performa Website untuk Loading Lebih Cepat',
            'Keamanan Website: Panduan Melindungi Data Pengguna',
            'Desain UI/UX yang Menarik untuk Website Modern',
            'Integrasi Database MySQL dengan Laravel',
            'Memahami Konsep RESTful API dalam Pengembangan Web',
            'Git dan GitHub: Panduan Version Control untuk Developer',
            'Strategi Deployment Aplikasi Web ke Production',
            'Microservices vs Monolith: Mana yang Lebih Baik?',
            'Testing di Laravel: Unit Test dan Feature Test',
        ];
        
        $excerpts = [
            'Pelajari dasar-dasar pemrograman web mulai dari HTML, CSS, hingga JavaScript dengan cara yang mudah dipahami.',
            'Framework Laravel menjadi pilihan utama developer untuk membangun aplikasi web yang scalable dan maintainable.',
            'Tailwind CSS memudahkan developer dalam membuat desain responsif tanpa menulis CSS dari awal.',
            'Panduan lengkap memahami konsep MVC dan implementasinya dalam pengembangan aplikasi berbasis web.',
            'Tutorial step-by-step membuat aplikasi CRUD (Create, Read, Update, Delete) menggunakan Laravel 12.',
            'Ikuti best practice dalam coding untuk menghasilkan kode yang clean, efisien, dan mudah dimaintain.',
            'Teknik optimasi website mulai dari kompresi gambar, lazy loading, hingga caching untuk performa maksimal.',
            'Lindungi website Anda dari berbagai ancaman keamanan dengan implementasi security best practices.',
            'Prinsip-prinsip desain UI/UX yang harus dipahami untuk menciptakan pengalaman pengguna yang optimal.',
            'Cara menghubungkan aplikasi Laravel dengan database MySQL dan melakukan operasi database dengan Eloquent ORM.',
            'RESTful API adalah standar dalam pembuatan web service yang memudahkan komunikasi antar aplikasi.',
            'Version control adalah skill wajib untuk developer modern. Pelajari cara menggunakan Git dengan efektif.',
            'Proses deployment yang tepat memastikan aplikasi berjalan lancar di production environment.',
            'Pahami perbedaan arsitektur microservices dan monolith untuk memilih yang sesuai dengan kebutuhan project.',
            'Testing adalah investasi yang menghemat waktu debugging dan meningkatkan kualitas aplikasi.',
        ];
        
        $bodies = [
            "Pemrograman web adalah salah satu skill yang paling dicari di era digital ini. Dengan mempelajari HTML, CSS, dan JavaScript sebagai fondasi, Anda dapat membuat website interaktif yang menarik.\n\nHTML (HyperText Markup Language) adalah bahasa markup yang digunakan untuk membuat struktur halaman web. CSS (Cascading Style Sheets) digunakan untuk styling dan layout. Sedangkan JavaScript membuat website menjadi interaktif dan dinamis.\n\nMulailah dengan project sederhana seperti membuat landing page atau portfolio pribadi. Praktik secara konsisten adalah kunci untuk menguasai pemrograman web.",
            
            "Laravel adalah framework PHP yang powerful dan elegant, dirancang untuk memudahkan developer dalam membangun aplikasi web modern. Dengan arsitektur MVC yang jelas, Laravel memisahkan logic bisnis, tampilan, dan data dengan rapi.\n\nBeberapa fitur unggulan Laravel antara lain: Eloquent ORM untuk database operations, Blade templating engine, built-in authentication, routing yang flexible, dan ekosistem yang kaya.\n\nLaravel sangat cocok untuk project mulai dari skala kecil hingga enterprise. Documentation yang lengkap dan community yang aktif membuat learning curve Laravel menjadi lebih mudah.",
            
            "Tailwind CSS adalah utility-first CSS framework yang revolusioner. Berbeda dengan framework tradisional seperti Bootstrap, Tailwind memberikan low-level utility classes yang dapat dikombinasikan untuk membuat design custom.\n\nKeuntungan menggunakan Tailwind CSS: workflow yang lebih cepat, ukuran CSS yang minimal dengan PurgeCSS, customization yang sangat flexible, dan konsistensi design yang terjaga.\n\nDengan Tailwind, Anda tidak perlu lagi menulis custom CSS untuk setiap component. Cukup kombinasikan utility classes yang sudah tersedia untuk mencapai design yang diinginkan.",
            
            "Model-View-Controller (MVC) adalah architectural pattern yang memisahkan aplikasi menjadi tiga komponen utama. Model mengelola data dan business logic, View menangani presentasi/UI, dan Controller mengatur flow aplikasi.\n\nDengan pattern MVC, kode menjadi lebih terorganisir, mudah di-maintain, dan memudahkan kolaborasi tim. Setiap komponen memiliki tanggung jawab yang jelas sehingga perubahan pada satu bagian tidak mempengaruhi bagian lainnya.\n\nFramework modern seperti Laravel mengimplementasikan MVC pattern dengan sangat baik, lengkap dengan tools dan conventions yang memudahkan development.",
            
            "CRUD adalah singkatan dari Create, Read, Update, dan Delete - operasi dasar dalam pengelolaan data. Setiap aplikasi web pasti memerlukan fungsionalitas CRUD untuk mengelola data pengguna, produk, artikel, dan lainnya.\n\nDalam Laravel, implementasi CRUD sangat mudah dengan bantuan Eloquent ORM. Anda dapat melakukan operasi database tanpa menulis raw SQL query. Resource controller juga memudahkan pengelolaan routes untuk operasi CRUD.\n\nTutorial ini akan memandu Anda step-by-step membuat aplikasi CRUD lengkap dengan form validation, error handling, dan security measures.",
            
            "Performa website adalah faktor krusial yang mempengaruhi user experience dan SEO ranking. Website yang lambat akan ditinggalkan pengunjung dalam hitungan detik.\n\nBeberapa teknik optimasi yang bisa diterapkan: kompresi gambar dengan format modern seperti WebP, implementasi lazy loading untuk resource yang tidak terlihat di viewport, minifikasi CSS dan JavaScript, penggunaan CDN untuk static assets, dan caching strategy yang tepat.\n\nDengan menerapkan teknik-teknik ini, loading time website Anda bisa dikurangi hingga 50-70%, meningkatkan conversion rate dan kepuasan pengguna.",
            
            "Keamanan website adalah aspek yang tidak boleh diabaikan dalam pengembangan web. Ancaman seperti SQL Injection, XSS, CSRF, dan serangan lainnya dapat membahayakan data pengguna dan reputasi bisnis.\n\nLaravel sudah menyediakan berbagai fitur keamanan built-in seperti CSRF protection, SQL injection prevention melalui Eloquent ORM, password hashing dengan Bcrypt, dan encryption untuk data sensitif.\n\nSelalu update framework ke versi terbaru, gunakan HTTPS, implementasikan rate limiting, dan lakukan security audit secara berkala untuk menjaga keamanan aplikasi.",
            
            "Desain UI/UX yang baik adalah kunci kesuksesan sebuah aplikasi web. User Interface (UI) berfokus pada tampilan visual, sedangkan User Experience (UX) mengutamakan kemudahan dan kenyamanan pengguna.\n\nPrinsip dasar desain yang perlu diperhatikan: konsistensi dalam penggunaan warna dan typography, hierarki visual yang jelas, white space yang cukup, responsive design untuk berbagai device, dan accessibility untuk semua pengguna.\n\nGunakan tools seperti Figma atau Adobe XD untuk prototyping sebelum coding, dan selalu lakukan user testing untuk mendapatkan feedback.",
            
            "Database adalah jantung dari hampir setiap aplikasi web. Memahami cara kerja database dan bagaimana mengintegrasikannya dengan aplikasi adalah skill fundamental yang harus dikuasai developer.\n\nEloquent ORM di Laravel menyediakan cara yang elegant untuk berinteraksi dengan database. Anda bisa melakukan operasi CRUD, membuat relasi antar tabel, dan menulis query kompleks tanpa menulis raw SQL.\n\nPelajari juga tentang database design, normalisasi, indexing, dan query optimization untuk membangun aplikasi yang scalable dan performant.",
            
            "Best practices dalam development tidak hanya tentang menulis kode yang bekerja, tetapi menulis kode yang maintainable, scalable, dan mudah dipahami oleh developer lain.\n\nBeberapa best practices yang harus diterapkan: gunakan naming convention yang konsisten, tulis kode yang DRY (Don't Repeat Yourself), implementasikan SOLID principles, buat dokumentasi yang jelas, dan gunakan version control seperti Git.\n\nCode review dan automated testing juga penting untuk menjaga kualitas kode. Investasi waktu untuk menulis clean code akan menghemat banyak waktu di masa depan.",
        ];
        
        // Pilih random dari array
        $title = fake()->randomElement($titles);
        $excerpt = fake()->randomElement($excerpts);
        $body = fake()->randomElement($bodies);
        
        // Generate slug dengan suffix random untuk memastikan uniqueness
        $baseSlug = Str::slug($title);
        $slug = $baseSlug . '-' . fake()->unique()->numberBetween(1000, 9999);

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'body' => $body,
            'image' => null,
        ];
    }
}