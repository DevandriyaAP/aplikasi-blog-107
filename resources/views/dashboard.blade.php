@extends('layouts.cms')

@section('title', 'Dashboard')

@section('content')
<div class="page-header mb-4">
    <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
    <p class="text-muted">Selamat datang di CMS Blog, {{ Auth::user()->name }}!</p>
</div>

<!-- Quick Stats -->
<div class="row mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-list fa-2x text-primary mb-2"></i>
                <h5 class="card-title">Kategori</h5>
                <p class="card-text display-6">{{ \App\Models\KategoriArtikel::count() }}</p>
                <a href="{{ route('kategori-artikel.index') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-arrow-right"></i> Kelola
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-pen-fancy fa-2x text-success mb-2"></i>
                <h5 class="card-title">Penulis</h5>
                <p class="card-text display-6">{{ \App\Models\Penulis::count() }}</p>
                <a href="{{ route('penulis.index') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-arrow-right"></i> Kelola
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-newspaper fa-2x text-info mb-2"></i>
                <h5 class="card-title">Artikel</h5>
                <p class="card-text display-6">{{ \App\Models\Artikel::count() }}</p>
                <a href="{{ route('artikel.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-arrow-right"></i> Kelola
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-user fa-2x text-warning mb-2"></i>
                <h5 class="card-title">Profil</h5>
                <p class="card-text text-muted small">{{ Auth::user()->email }}</p>
                <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-arrow-right"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Blog Publik -->
<div class="row mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card" style="background: linear-gradient(135deg, #059669 0%, #047857 100%); border: none;">
            <div class="card-body text-center" style="color: white;">
                <i class="fas fa-globe fa-2x mb-2"></i>
                <h5 class="card-title" style="color: white;">Blog Publik</h5>
                <p class="card-text text-light small">Lihat blog dari sisi pembaca</p>
                <a href="{{ route('publik.index') }}" class="btn btn-sm btn-light" target="_blank">
                    <i class="fas fa-external-link-alt"></i> Kunjungi
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-plus"></i> Aksi Cepat
            </div>
            <div class="card-body">
                <a href="{{ route('kategori-artikel.create') }}" class="btn btn-primary btn-sm mb-2 w-100">
                    <i class="fas fa-plus"></i> Tambah Kategori
                </a>
                <a href="{{ route('penulis.create') }}" class="btn btn-success btn-sm mb-2 w-100">
                    <i class="fas fa-plus"></i> Tambah Penulis
                </a>
                <a href="{{ route('artikel.create') }}" class="btn btn-info btn-sm mb-2 w-100">
                    <i class="fas fa-plus"></i> Tambah Artikel
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-info-circle"></i> Informasi
            </div>
            <div class="card-body">
                <p class="small"><strong>Sistem:</strong> Laravel CMS Blog</p>
                <p class="small"><strong>Pengguna:</strong> {{ Auth::user()->name }}</p>
                <p class="small"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p class="small"><strong>Bergabung:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-book"></i> Artikel Terbaru
            </div>
            <div class="card-body">
                @php
                    $recentArticles = \App\Models\Artikel::latest()->take(3)->get();
                @endphp
                @if($recentArticles->count() > 0)
                    <ul class="list-unstyled">
                        @foreach($recentArticles as $article)
                            <li class="mb-2">
                                <a href="{{ route('artikel.edit', $article->id) }}" class="text-decoration-none small">
                                    <i class="fas fa-arrow-right"></i> {{ Str::limit($article->judul, 30) }}
                                </a>
                                <br>
                                <small class="text-muted">{{ $article->created_at->diffForHumans() }}</small>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted small">Belum ada artikel</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
