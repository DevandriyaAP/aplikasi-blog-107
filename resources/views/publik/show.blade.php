@extends('layouts.publik')

@section('title', $artikel->judul)

@section('css')
    <style>
        .artikel-detail-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e3a8a 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
        }

        .artikel-detail-header h1 {
            font-weight: 700;
            font-size: 2rem;
            line-height: 1.3;
            margin-bottom: 15px;
        }

        .artikel-detail-meta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .artikel-detail-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .artikel-detail-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .artikel-detail-content {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            line-height: 1.8;
            color: #333;
            margin-bottom: 30px;
        }

        .artikel-detail-content p {
            margin-bottom: 15px;
        }

        .artikel-detail-content h2,
        .artikel-detail-content h3 {
            color: var(--primary-color);
            margin-top: 25px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .artikel-detail-content h2 {
            font-size: 1.5rem;
        }

        .artikel-detail-content h3 {
            font-size: 1.25rem;
        }

        .artikel-detail-content strong {
            color: var(--primary-color);
        }

        .artikel-detail-content ul,
        .artikel-detail-content ol {
            margin-bottom: 15px;
            padding-left: 25px;
        }

        .artikel-detail-content li {
            margin-bottom: 8px;
        }

        .artikel-detail-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: #f8fafc;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .artikel-detail-footer a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .artikel-detail-footer a:hover {
            color: #1e3a8a;
        }

        .terkait-artikel {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #e2e8f0;
        }

        .terkait-artikel h3 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 20px;
        }

        .terkait-card {
            border: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .terkait-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .terkait-card-title {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 20px;
        }

        .breadcrumb-item {
            color: #94a3b8;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: #1e3a8a;
        }

        .breadcrumb-item.active {
            color: var(--primary-color);
        }

        .badge-kategori {
            background-color: #dbeafe;
            color: var(--primary-color);
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            margin-right: 10px;
        }

        .btn-back {
            color: var(--primary-color);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-back:hover {
            color: #1e3a8a;
            transform: translateX(-3px);
        }

        @media (max-width: 768px) {
            .artikel-detail-header h1 {
                font-size: 1.5rem;
            }

            .artikel-detail-content {
                padding: 20px;
            }

            .artikel-detail-meta {
                flex-direction: column;
                gap: 10px;
            }
        }

        /* Sidebar Styles */
        .sidebar-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
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
    </style>
@endsection

@section('content')
<div class="container-lg pb-5">
    <!-- Back Button -->
    <a href="{{ route('publik.index') }}" class="btn-back">
        <i class="fas fa-arrow-left"></i> Kembali ke Beranda
    </a>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('publik.index') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('publik.index', ['kategori' => $artikel->kategori->id]) }}">{{ $artikel->kategori->nama_kategori }}</a></li>
            <li class="breadcrumb-item active">{{ Str::limit($artikel->judul, 50) }}</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="artikel-detail-header">
        <h1>{{ $artikel->judul }}</h1>
        <div class="artikel-detail-meta">
            <span>
                <i class="fas fa-user"></i> {{ $artikel->penulis->nama }}
            </span>
            <span>
                <i class="fas fa-calendar"></i> {{ $artikel->created_at->format('d F Y') }}
            </span>
            <span>
                <i class="fas fa-clock"></i> {{ $artikel->updated_at->diffForHumans() }}
            </span>
        </div>
    </div>

    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Gambar -->
            @if($artikel->gambar)
                <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="artikel-detail-image">
            @endif

            <!-- Konten Artikel -->
            <div class="artikel-detail-content">
                <div class="artikel-detail-footer" style="margin-bottom: 20px;">
                    <div>
                        <span class="badge-kategori">
                            <i class="fas fa-tag"></i> {{ $artikel->kategori->nama_kategori }}
                        </span>
                    </div>
                    <div>
                        <span style="color: #94a3b8; font-size: 0.9rem;">
                            Dibaca {{ rand(100, 10000) }}x
                        </span>
                    </div>
                </div>

                {!! $artikel->isi !!}
            </div>

            <!-- Share & Back -->
            <div class="artikel-detail-footer">
                <div>
                    <span style="color: var(--secondary-color);">Bagikan:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" style="margin-left: 10px; margin-right: 10px;">
                        <i class="fab fa-facebook text-primary"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $artikel->judul }}" target="_blank" style="margin-right: 10px;">
                        <i class="fab fa-twitter text-info"></i>
                    </a>
                    <a href="https://wa.me/?text={{ $artikel->judul }}%20{{ url()->current() }}" target="_blank">
                        <i class="fab fa-whatsapp text-success"></i>
                    </a>
                </div>
                <a href="{{ route('publik.index') }}" style="text-decoration: none; color: var(--primary-color);">
                    Kembali ke Beranda <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Info Penulis -->
            <div class="sidebar-card">
                <div class="sidebar-card-header">
                    <i class="fas fa-user-circle"></i> Tentang Penulis
                </div>
                <div style="padding: 20px; text-align: center;">
                    <i class="fas fa-user fa-3x text-muted mb-3" style="display: block; margin-bottom: 15px;"></i>
                    <h5 style="color: var(--primary-color); margin-bottom: 5px;">{{ $artikel->penulis->nama }}</h5>
                    <p style="color: var(--secondary-color); margin: 0; font-size: 0.9rem;">
                        Penulis aktif di blog ini
                    </p>
                </div>
            </div>

            <!-- Artikel Terkait -->
            @if($artikelTerkait->count() > 0)
                <div class="sidebar-card">
                    <div class="sidebar-card-header">
                        <i class="fas fa-link"></i> Artikel Terkait
                    </div>
                    <div style="padding: 20px;">
                        @foreach($artikelTerkait as $terkait)
                            <a href="{{ route('publik.show', $terkait->id) }}" style="text-decoration: none; display: block; margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #e2e8f0;">
                                <div class="terkait-card-title">
                                    {{ $terkait->judul }}
                                </div>
                                <small style="color: #94a3b8;">
                                    <i class="fas fa-calendar"></i> {{ $terkait->created_at->format('d M Y') }}
                                </small>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Kategori Sidebar -->
            <div class="sidebar-card">
                <div class="sidebar-card-header">
                    <i class="fas fa-list"></i> Kategori Lainnya
                </div>
                <ul class="sidebar-list">
                    @foreach(\App\Models\KategoriArtikel::withCount('artikel')->get() as $kat)
                        <li class="sidebar-list-item">
                            <a href="{{ route('publik.index', ['kategori' => $kat->id]) }}" class="sidebar-list-link">
                                <i class="fas fa-folder"></i> {{ $kat->nama_kategori }}
                                <span class="sidebar-list-count">{{ $kat->artikel_count }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
