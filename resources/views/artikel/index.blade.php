@extends('layouts.cms')

@section('title', 'Data Artikel')

@section('content')
<div class="page-header">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1><i class="fas fa-newspaper"></i> Data Artikel</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Artikel</li>
                </ol>
            </nav>
        </div>
        <div class="col-auto">
            <a href="{{ route('artikel.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Artikel
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Daftar Artikel</span>
        <span class="badge bg-primary">{{ $artikels->count() }} Artikel</span>
    </div>
    <div class="card-body p-0">
        @if($artikels->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($artikels as $key => $artikel)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if($artikel->gambar)
                                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" 
                                         style="width: 50px; height: 50px; border-radius: 4px; object-fit: cover;">
                                @else
                                    <div style="width: 50px; height: 50px; border-radius: 4px; background-color: #cbd5e1; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-image" style="color: white;"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ Str::limit($artikel->judul, 50) }}</strong>
                            </td>
                            <td>
                                <small>{{ $artikel->penulis->nama }}</small>
                            </td>
                            <td>
                                <span class="badge bg-success">{{ $artikel->kategori->nama_kategori }}</span>
                            </td>
                            <td>
                                <small class="text-muted">
                                    {{ $artikel->created_at->format('d/m/Y H:i') }}
                                </small>
                            </td>
                            <td>
                                <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('artikel.destroy', $artikel->id) }}" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <h4>Tidak ada data</h4>
                <p>Belum ada artikel yang ditambahkan.</p>
                <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-sm mt-3">
                    <i class="fas fa-plus"></i> Tambah Artikel
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
