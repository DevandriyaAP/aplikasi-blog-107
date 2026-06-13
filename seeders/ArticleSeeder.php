<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Models\Penulis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Jalankan seeder untuk artikel
     */
    public function run(): void
    {
        // Buat kategori jika belum ada
        $kategoriTech = KategoriArtikel::firstOrCreate(
            ['nama_kategori' => 'Teknologi'],
            ['nama_kategori' => 'Teknologi']
        );

        $kategoriDesain = KategoriArtikel::firstOrCreate(
            ['nama_kategori' => 'Desain'],
            ['nama_kategori' => 'Desain']
        );

        $kategoriBisnis = KategoriArtikel::firstOrCreate(
            ['nama_kategori' => 'Bisnis'],
            ['nama_kategori' => 'Bisnis']
        );

        // Buat penulis jika belum ada
        $penulisSiti = Penulis::firstOrCreate(
            ['email' => 'siti.developer@example.com'],
            [
                'nama' => 'Siti Developer',
                'email' => 'siti.developer@example.com',
                'foto' => 'https://i.pravatar.cc/150?img=1'
            ]
        );

        $penulisAhmed = Penulis::firstOrCreate(
            ['email' => 'ahmed.designer@example.com'],
            [
                'nama' => 'Ahmed Desainer',
                'email' => 'ahmed.designer@example.com',
                'foto' => 'https://i.pravatar.cc/150?img=2'
            ]
        );

        $penulisBudi = Penulis::firstOrCreate(
            ['email' => 'budi.strategist@example.com'],
            [
                'nama' => 'Budi Strategist',
                'email' => 'budi.strategist@example.com',
                'foto' => 'https://i.pravatar.cc/150?img=3'
            ]
        );

        // Artikel 1: Teknologi
        Artikel::firstOrCreate(
            ['judul' => '10 Framework JavaScript Terbaik 2024 untuk Developer'],
            [
                'penulis_id' => $penulisSiti->id,
                'kategori_artikel_id' => $kategoriTech->id,
                'judul' => '10 Framework JavaScript Terbaik 2024 untuk Developer',
                'isi' => '<h2>Pengenalan Framework JavaScript Modern</h2>
<p>Framework JavaScript telah berkembang pesat dalam beberapa tahun terakhir. Pemilihan framework yang tepat sangat penting untuk kesuksesan proyek web Anda. Mari kita lihat 10 framework JavaScript terbaik yang paling banyak digunakan oleh developer profesional di seluruh dunia.</p>

<h3>1. React.js</h3>
<p>React adalah library JavaScript yang dikembangkan oleh Facebook untuk membangun antarmuka pengguna yang interaktif. Dengan virtual DOM dan component-based architecture, React memudahkan developer untuk membuat aplikasi yang cepat dan scalable.</p>

<h3>2. Vue.js</h3>
<p>Vue.js adalah framework progressive yang dirancang untuk kemudahan pembelajaran. Vue menggabungkan yang terbaik dari Angular dan React, menjadikannya pilihan sempurna untuk proyek dari berbagai ukuran.</p>

<h3>3. Angular</h3>
<p>Angular adalah framework lengkap yang dikembangkan oleh Google. Dengan fitur-fitur canggih seperti dependency injection dan reactive programming, Angular cocok untuk aplikasi enterprise yang kompleks.</p>

<h3>Keuntungan Menggunakan Framework</h3>
<ul>
<li>Meningkatkan produktivitas development</li>
<li>Memudahkan maintenance dan debugging</li>
<li>Menyediakan struktur yang terorganisir</li>
<li>Memiliki komunitas yang besar dan aktif</li>
<li>Tersedia banyak library dan tools pendukung</li>
</ul>

<p><strong>Kesimpulannya</strong>, memilih framework yang tepat tergantung pada kebutuhan proyek Anda, ukuran tim, dan preferensi personal. Setiap framework memiliki kelebihan dan kekurangan tersendiri yang perlu dipertimbangkan sebelum memulai proyek.</p>',
                'gambar' => null
            ]
        );

        // Artikel 2: Teknologi
        Artikel::firstOrCreate(
            ['judul' => 'Laravel 11: Fitur-Fitur Baru yang Mengubah Web Development'],
            [
                'penulis_id' => $penulisSiti->id,
                'kategori_artikel_id' => $kategoriTech->id,
                'judul' => 'Laravel 11: Fitur-Fitur Baru yang Mengubah Web Development',
                'isi' => '<h2>Apa itu Laravel 11?</h2>
<p>Laravel 11 adalah versi terbaru dari framework PHP yang paling populer di industri. Dengan berbagai peningkatan dan fitur baru, Laravel 11 membuat development aplikasi web menjadi lebih efisien dan menyenangkan.</p>

<h3>Fitur-Fitur Utama Laravel 11</h3>
<p>Berikut adalah beberapa fitur unggulan yang hadir di Laravel 11:</p>

<ul>
<li><strong>Performance Improvements:</strong> Performa aplikasi lebih cepat dengan optimasi internal</li>
<li><strong>Streamlined Application Structure:</strong> Struktur project yang lebih sederhana dan intuitif</li>
<li><strong>Enhanced Blade Components:</strong> Komponen Blade yang lebih powerful dan fleksibel</li>
<li><strong>Native TypeScript Support:</strong> Dukungan TypeScript yang lebih baik</li>
<li><strong>Improved Testing Tools:</strong> Tools testing yang lebih komprehensif</li>
</ul>

<h3>Migration dari Laravel 10 ke 11</h3>
<p>Proses migrasi sangat mudah dan dokumentasi lengkap tersedia di website resmi Laravel. Sebagian besar kode Anda akan kompatibel tanpa perubahan signifikan.</p>

<p>Laravel 11 membawa ekosistem Laravel ke level yang lebih tinggi dengan fokus pada developer experience dan performance yang optimal.</p>',
                'gambar' => null
            ]
        );

        // Artikel 3: Desain
        Artikel::firstOrCreate(
            ['judul' => 'Prinsip-Prinsip Design System untuk UI/UX Designer'],
            [
                'penulis_id' => $penulisAhmed->id,
                'kategori_artikel_id' => $kategoriDesain->id,
                'judul' => 'Prinsip-Prinsip Design System untuk UI/UX Designer',
                'isi' => '<h2>Memahami Design System</h2>
<p>Design System adalah sebuah koleksi komponen yang dapat digunakan kembali, panduan desain, dan pola-pola interaksi yang memastikan konsistensi di seluruh produk digital. Design System membantu tim untuk bekerja lebih efisien dan menciptakan pengalaman pengguna yang lebih baik.</p>

<h3>Komponen Utama Design System</h3>
<p>Setiap Design System biasanya terdiri dari:</p>
<ul>
<li><strong>Color Palette:</strong> Skema warna yang konsisten</li>
<li><strong>Typography:</strong> Aturan penggunaan font dan ukuran teks</li>
<li><strong>Component Library:</strong> Koleksi UI components yang reusable</li>
<li><strong>Layout Grid:</strong> Sistem grid untuk positioning elemen</li>
<li><strong>Icons:</strong> Set ikon yang konsisten</li>
</ul>

<h3>Manfaat Design System</h3>
<p>Implementasi design system yang baik memberikan banyak manfaat, termasuk:</p>
<ul>
<li>Konsistensi visual di seluruh platform</li>
<li>Mempercepat proses design dan development</li>
<li>Mengurangi debt teknis</li>
<li>Memudahkan kolaborasi antar tim</li>
<li>Meningkatkan user experience</li>
</ul>

<p>Dengan memiliki design system yang solid, produk Anda akan terlihat lebih profesional dan memberikan pengalaman yang lebih baik kepada pengguna.</p>',
                'gambar' => null
            ]
        );

        // Artikel 4: Bisnis
        Artikel::firstOrCreate(
            ['judul' => 'Strategi Digital Marketing untuk UMKM di Era Digital'],
            [
                'penulis_id' => $penulisBudi->id,
                'kategori_artikel_id' => $kategoriBisnis->id,
                'judul' => 'Strategi Digital Marketing untuk UMKM di Era Digital',
                'isi' => '<h2>Pentingnya Digital Marketing untuk UMKM</h2>
<p>Di era digital ini, UMKM perlu memahami dan memanfaatkan digital marketing untuk meningkatkan visibilitas dan penjualan mereka. Digital marketing memberikan kesempatan yang sama bagi bisnis besar dan kecil untuk bersaing di pasar global.</p>

<h3>Strategi Digital Marketing yang Efektif</h3>
<p>Berikut adalah strategi-strategi yang dapat membantu UMKM berkembang:</p>

<h4>1. Social Media Marketing</h4>
<p>Manfaatkan platform media sosial seperti Instagram, TikTok, dan Facebook untuk membangun komunitas dan menjual produk Anda secara langsung.</p>

<h4>2. Search Engine Optimization (SEO)</h4>
<p>Optimalkan website Anda agar muncul di halaman pertama hasil pencarian Google. Ini akan meningkatkan organic traffic ke website Anda.</p>

<h4>3. Email Marketing</h4>
<p>Bangun email list Anda dan gunakan untuk komunikasi regular dengan pelanggan setia. Email marketing memiliki ROI yang sangat tinggi.</p>

<h4>4. Content Marketing</h4>
<p>Buat konten berkualitas yang memberikan nilai kepada audience Anda. Konten yang baik akan meningkatkan kepercayaan dan authority brand Anda.</p>

<h3>Mengukur Kesuksesan</h3>
<p>Penting untuk melacak metrik-metrik kunci seperti traffic, conversion rate, dan customer acquisition cost untuk memastikan strategi Anda berjalan efektif.</p>',
                'gambar' => null
            ]
        );

        // Artikel 5: Teknologi
        Artikel::firstOrCreate(
            ['judul' => 'Keamanan Web: Best Practices untuk Melindungi Aplikasi Anda'],
            [
                'penulis_id' => $penulisSiti->id,
                'kategori_artikel_id' => $kategoriTech->id,
                'judul' => 'Keamanan Web: Best Practices untuk Melindungi Aplikasi Anda',
                'isi' => '<h2>Pentingnya Keamanan Web</h2>
<p>Keamanan aplikasi web adalah prioritas utama bagi setiap developer. Dengan meningkatnya serangan cyber, penting untuk mengetahui best practices dalam mengamankan aplikasi Anda dari berbagai ancaman keamanan.</p>

<h3>Ancaman Keamanan Web Umum</h3>
<ul>
<li><strong>SQL Injection:</strong> Menyisipkan kode SQL berbahaya melalui input</li>
<li><strong>Cross-Site Scripting (XSS):</strong> Menyisipkan script berbahaya ke dalam halaman web</li>
<li><strong>Cross-Site Request Forgery (CSRF):</strong> Memaksa pengguna untuk membuat request yang tidak disengaja</li>
<li><strong>Man-in-the-Middle (MITM):</strong> Menyadap komunikasi antara client dan server</li>
<li><strong>Brute Force Attack:</strong> Mencoba berbagai kombinasi password</li>
</ul>

<h3>Best Practices Keamanan</h3>
<p>Untuk melindungi aplikasi Anda, terapkan praktik-praktik berikut:</p>

<h4>1. Gunakan HTTPS</h4>
<p>Selalu gunakan HTTPS untuk mengenkripsi komunikasi antara browser dan server. Ini akan melindungi data sensitif dari penyadapan.</p>

<h4>2. Input Validation</h4>
<p>Validasi semua input dari pengguna di server-side. Jangan pernah percaya data yang datang dari client.</p>

<h4>3. Output Encoding</h4>
<p>Encoding output untuk mencegah XSS attacks. Frameworks seperti Laravel sudah menyediakan helper untuk ini.</p>

<h4>4. Use Prepared Statements</h4>
<p>Gunakan prepared statements atau ORM untuk query database. Ini akan melindungi dari SQL injection.</p>

<h4>5. Secure Password Storage</h4>
<p>Selalu hash password dengan algoritma yang kuat. Jangan simpan password dalam plain text.</p>

<h4>6. Regular Updates</h4>
<p>Update framework dan dependencies Anda secara regular untuk mendapatkan security patches terbaru.</p>

<p><strong>Kesimpulannya</strong>, keamanan adalah tanggung jawab bersama developer, designer, dan DevOps. Dengan menerapkan best practices ini, Anda akan mempunyai aplikasi yang lebih aman dan terpercaya.</p>',
                'gambar' => null
            ]
        );
    }
}
