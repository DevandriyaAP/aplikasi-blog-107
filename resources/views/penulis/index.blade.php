@extends('layouts.cms')

@section('title', 'Data Penulis')

@section('content')
<div class="page-header">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1><i class="fas fa-pen-fancy"></i> Data Penulis</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Penulis</li>
                </ol>
            </nav>
        </div>
        <div class="col-auto">
            <a href="{{ route('penulis.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Penulis
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Daftar Penulis</span>
        <span class="badge bg-primary">{{ $penulis->count() }} Penulis</span>
    </div>
    <div class="card-body p-0">
        @if($penulis->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jumlah Artikel</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penulis as $key => $p)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if($p->foto)
                                    <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}" 
                                         style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                @else
                                    <div style="width: 40px; height: 40px; border-radius: 50%; background-color: #cbd5e1; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-user" style="color: white;"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $p->nama }}</strong>
                            </td>
                            <td>
                                <small>{{ $p->email }}</small>
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $p->artikel()->count() }} Artikel</span>
                            </td>
                            <td>
                                <small class="text-muted">
                                    {{ $p->created_at->format('d/m/Y H:i') }}
                                </small>
                            </td>
                            <td>
                                <a href="{{ route('penulis.edit', $p->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('penulis.destroy', $p->id) }}" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus penulis ini?');">
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
                <p>Belum ada penulis yang ditambahkan.</p>
                <a href="{{ route('penulis.create') }}" class="btn btn-primary btn-sm mt-3">
                    <i class="fas fa-plus"></i> Tambah Penulis
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
