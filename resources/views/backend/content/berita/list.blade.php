@extends('backend.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">List Berita</h1>
            </div>
            <div class="col-lg-6 text-right">
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'penulis')
                    <a href="{{ route(auth()->user()->role . '.berita.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                @endif
            </div>
        </div>

        @if (session()->has('pesan'))
            <div class="alert alert-success" {{ session()->get('pesan')[0] }}>
                {{ session()->get('pesan')[1] }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Slug</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th>Total Views</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($berita as $beritaItem)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $beritaItem->judul }}</td>
                                    <td>{{$beritaItem->slug}}</td>
                                    <td>
                                        <img src="{{ asset('storage/berita/' . $beritaItem->gambar) }}" width="80px"
                                            height="60px" alt="Gambar Banner Berita">
                                    </td>
                                    <td>{{ $beritaItem->kategori->nama_kategori }}</td>
                                    <td>{{ $beritaItem->total_views }}</td>
                                    <td>

                                        <a href="{{ route(auth()->user()->role . '.berita.edit', $beritaItem->id_berita) }}"
                                            class="btn btn-sm btn-secondary">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <form
                                            action="{{ route(auth()->user()->role . '.berita.destroy', $beritaItem->id_berita) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Anda yakin ingin menghapus berita ini?')">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
