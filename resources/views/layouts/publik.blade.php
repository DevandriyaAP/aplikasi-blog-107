<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Blog') - {{ config('app.name', 'Blog') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #1e40af;
            --secondary-color: #64748b;
        }

        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3a8a 100%);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 0.5px;
        }

        .navbar-brand:hover {
            color: #fff !important;
        }

        .nav-link {
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #dbeafe !important;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3a8a 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hero-section h1 {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .hero-section p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Main Content */
        .main-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        /* Artikel Card */
        .artikel-card {
            border: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .artikel-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .artikel-card-img {
            height: 200px;
            object-fit: cover;
            background-color: #e2e8f0;
        }

        .artikel-card-body {
            padding: 20px;
        }

        .artikel-card-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 1.1rem;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .artikel-card:hover .artikel-card-title {
            color: #1e3a8a;
        }

        .artikel-card-excerpt {
            color: var(--secondary-color);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .artikel-card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
            font-size: 0.85rem;
            color: #94a3b8;
        }

        .artikel-card-meta a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .artikel-card-meta a:hover {
            color: #1e3a8a;
        }

        .badge-kategori {
            background-color: #dbeafe;
            color: var(--primary-color);
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Sidebar */
        .sidebar-card {
            background: white;
            border: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .sidebar-card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3a8a 100%);
            color: white;
            padding: 15px 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .sidebar-card-header i {
            margin-right: 10px;
        }

        .sidebar-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-list-item {
            border-bottom: 1px solid #e2e8f0;
        }

        .sidebar-list-item:last-child {
            border-bottom: none;
        }

        .sidebar-list-link {
            display: block;
            padding: 12px 20px;
            color: var(--secondary-color);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .sidebar-list-link:hover {
            background-color: #f8fafc;
            color: var(--primary-color);
            padding-left: 25px;
        }

        .sidebar-list-link.active {
            background-color: #dbeafe;
            color: var(--primary-color);
            border-left: 3px solid var(--primary-color);
            padding-left: 22px;
            font-weight: 600;
        }

        .sidebar-list-count {
            float: right;
            background-color: #dbeafe;
            color: var(--primary-color);
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* Pagination */
        .pagination {
            margin-top: 30px;
        }

        .page-link {
            color: var(--primary-color);
            border-color: #e2e8f0;
        }

        .page-link:hover {
            color: #1e3a8a;
            background-color: #f1f5f9;
            border-color: var(--primary-color);
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Footer */
        .footer {
            background: #1f2937;
            color: #e5e7eb;
            padding: 40px 0 20px;
            margin-top: 50px;
        }

        .footer-title {
            color: white;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .footer-link {
            color: #d1d5db;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: white;
        }

        .footer-divider {
            border-top: 1px solid #374151;
            padding-top: 20px;
            margin-top: 20px;
            text-align: center;
            color: #9ca3af;
        }

        /* Back to top button */
        .btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 99;
        }

        .btn-back-to-top:hover {
            background-color: #1e3a8a;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 1.8rem;
            }

            .main-container {
                padding: 20px;
            }
        }
    </style>

    @yield('css')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="{{ route('publik.index') }}">
                <i class="fas fa-newspaper"></i> Blog
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('publik.index') }}">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer;">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="footer-title">
                        <i class="fas fa-newspaper"></i> Blog
                    </h5>
                    <p>Platform blog modern untuk berbagi artikel dan pengetahuan.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="footer-title"><i class="fas fa-link"></i> Tautan Cepat</h5>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="{{ route('publik.index') }}" class="footer-link">Beranda</a></li>
                        <li><a href="{{ route('publik.index') }}" class="footer-link">Semua Artikel</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="footer-title"><i class="fas fa-info-circle"></i> Tentang</h5>
                    <p>Ini adalah proyek UAS yang menampilkan artikel-artikel menarik.</p>
                </div>
            </div>
            <div class="footer-divider">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Blog') }}. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <button class="btn-back-to-top" id="backToTopBtn" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Back to top button
        const backToTopBtn = document.getElementById('backToTopBtn');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.style.display = 'flex';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>

    @yield('js')
</body>
</html>
