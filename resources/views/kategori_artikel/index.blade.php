@extends('layouts.cms')

@section('title', 'Kategori Artikel')

@section('content')
<div class="page-header">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1><i class="fas fa-list"></i> Data Kategori Artikel</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
                </ol>
            </nav>
        </div>
        <div class="col-auto">
            <a href="{{ route('kategori-artikel.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Daftar Kategori</span>
        <span class="badge bg-primary">{{ $kategoris->count() }} Kategori</span>
    </div>
    <div class="card-body p-0">
        @if($kategoris->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Jumlah Artikel</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategoris as $key => $kategori)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <strong>{{ $kategori->nama_kategori }}</strong>
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $kategori->artikel()->count() }} Artikel</span>
                            </td>
                            <td>
                                <small class="text-muted">
                                    {{ $kategori->created_at->format('d/m/Y H:i') }}
                                </small>
                            </td>
                            <td>
                                <a href="{{ route('kategori-artikel.edit', $kategori->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('kategori-artikel.destroy', $kategori->id) }}" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
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
                <p>Belum ada kategori yang ditambahkan.</p>
                <a href="{{ route('kategori-artikel.create') }}" class="btn btn-primary btn-sm mt-3">
                    <i class="fas fa-plus"></i> Tambah Kategori
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
