@extends('layouts.publik')

@section('title', 'Beranda')

@section('css')
    <style>
        /* Artikel Card Styles */
        .artikel-card {
            border: none;
            margin-bottom: 25px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .artikel-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .artikel-card-img {
            object-fit: cover;
            min-height: 200px;
            border-radius: 12px 0 0 12px;
        }

        .artikel-card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 200px;
        }

        .artikel-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1.4;
            margin-bottom: 12px;
            transition: color 0.3s ease;
            display: block;
        }

        .artikel-card-title:hover {
            color: #1e3a8a;
            text-decoration: underline;
        }

        .artikel-card-excerpt {
            color: #64748b;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 15px;
            flex-grow: 1;
        }

        .artikel-card-meta {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            font-size: 0.9rem;
            align-items: center;
        }

        .artikel-card-meta span {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #64748b;
        }

        .artikel-card-meta i {
            color: var(--primary-color);
            font-size: 0.9rem;
        }

        .badge-kategori {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3a8a 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            white-space: nowrap;
        }

        .badge-kategori i {
            color: white;
            font-size: 0.8rem;
        }

        /* Sidebar Styles */
        .sidebar-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .sidebar-card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3a8a 100%);
            color: white;
            padding: 15px 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.05rem;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
            color: #64748b;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidebar-list-link:hover {
            background: #f8fafc;
            color: var(--primary-color);
            padding-left: 25px;
        }

        .sidebar-list-link.active {
            background: #dbeafe;
            color: var(--primary-color);
            font-weight: 600;
            border-left: 4px solid var(--primary-color);
            padding-left: 16px;
        }

        .sidebar-list-count {
            background: var(--primary-color);
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 700;
            min-width: 28px;
            text-align: center;
        }

        .sidebar-list-link.active .sidebar-list-count {
            background: #1e3a8a;
        }

        /* Pagination Styles */
        .pagination {
            margin-top: 30px;
            gap: 5px;
        }

        .page-link {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .page-item.active .page-link {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .page-item.disabled .page-link {
            border-color: #cbd5e1;
            color: #cbd5e1;
            cursor: not-allowed;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .artikel-card .row {
                flex-direction: column;
            }

            .artikel-card-img {
                border-radius: 12px 12px 0 0 !important;
                min-height: 200px;
            }

            .artikel-card-meta {
                gap: 10px;
                font-size: 0.85rem;
            }
        }
    </style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container-lg">
        <h1><i class="fas fa-blog"></i> Selamat Datang di Blog</h1>
        <p>Temukan artikel-artikel menarik dan terkini dari berbagai kategori</p>
    </div>
</div>

<!-- Main Content -->
<div class="container-lg pb-5">
    <div class="row">
        <!-- Artikel List -->
        <div class="col-lg-8">
            @if($artikels->count() > 0)
                @foreach($artikels as $artikel)
                    <div class="card artikel-card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if($artikel->gambar)
                                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="artikel-card-img w-100 h-100">
                                @else
                                    <div class="artikel-card-img w-100 d-flex align-items-center justify-content-center bg-light">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="artikel-card-body">
                                    <a href="{{ route('publik.show', $artikel->id) }}" class="artikel-card-title" style="text-decoration: none;">
                                        {{ $artikel->judul }}
                                    </a>
                                    <p class="artikel-card-excerpt">
                                        {{ Str::limit(strip_tags($artikel->isi), 150) }}
                                    </p>
                                    <div class="artikel-card-meta">
                                        <div>
                                            <span class="badge-kategori">
                                                <i class="fas fa-tag"></i> {{ $artikel->kategori->nama_kategori }}
                                            </span>
                                        </div>
                                        <div>
                                            <span>
                                                <i class="fas fa-user"></i> {{ $artikel->penulis->nama }}
                                            </span>
                                        </div>
                                        <div>
                                            <span>
                                                <i class="fas fa-calendar"></i> {{ $artikel->created_at->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                @if($artikels->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            {{-- Previous Page Link --}}
                            @if ($artikels->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">← Sebelumnya</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $artikels->previousPageUrl() }}">← Sebelumnya</a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
                                @if ($page == $artikels->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($artikels->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $artikels->nextPageUrl() }}">Selanjutnya →</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">Selanjutnya →</span></li>
                            @endif
                        </ul>
                    </nav>
                @endif
            @else
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i> Tidak ada artikel yang tersedia saat ini.
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Kategori Card -->
            <div class="sidebar-card">
                <div class="sidebar-card-header">
                    <i class="fas fa-list"></i> Kategori
                </div>
                <ul class="sidebar-list">
                    <li class="sidebar-list-item">
                        <a href="{{ route('publik.index') }}" class="sidebar-list-link {{ $kategoriTerpilih === null ? 'active' : '' }}">
                            <i class="fas fa-th"></i> Semua Artikel
                            <span class="sidebar-list-count">{{ \App\Models\Artikel::count() }}</span>
                        </a>
                    </li>
                    @foreach($kategoris as $kategori)
                        <li class="sidebar-list-item">
                            <a href="{{ route('publik.index', ['kategori' => $kategori->id]) }}" class="sidebar-list-link {{ $kategoriTerpilih === $kategori->id ? 'active' : '' }}">
                                <i class="fas fa-folder"></i> {{ $kategori->nama_kategori }}
                                <span class="sidebar-list-count">{{ $kategori->artikel_count }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Info Card -->
            <div class="sidebar-card">
                <div class="sidebar-card-header">
                    <i class="fas fa-lightbulb"></i> Informasi
                </div>
                <div style="padding: 20px;">
                    <p style="margin: 0; color: var(--secondary-color); line-height: 1.6;">
                        <strong>Selamat datang!</strong> Jelajahi berbagai artikel menarik dari berbagai kategori. 
                        Klik pada artikel untuk membaca selengkapnya.
                    </p>
                </div>
            </div>

            <!-- Stats Card -->
            <div class="sidebar-card">
                <div class="sidebar-card-header">
                    <i class="fas fa-chart-bar"></i> Statistik
                </div>
                <div style="padding: 20px;">
                    <div class="mb-3">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <span style="color: var(--secondary-color);">Total Artikel</span>
                            <strong style="color: var(--primary-color);">{{ \App\Models\Artikel::count() }}</strong>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <span style="color: var(--secondary-color);">Total Kategori</span>
                            <strong style="color: var(--primary-color);">{{ \App\Models\KategoriArtikel::count() }}</strong>
                        </div>
                    </div>
                    <div>
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: var(--secondary-color);">Total Penulis</span>
                            <strong style="color: var(--primary-color);">{{ \App\Models\Penulis::count() }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
