@extends('backend.layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Form Ubah Berita</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route(auth()->user()->role . '.berita.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" value="{{ $berita->judul }}"
                            class="form-control @error('judul') is-invalid @enderror">

                        @error('judul')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" value="{{ $berita->slug }}"
                            class="form-control @error('slug') is-invalid @enderror">

                        @error('slug')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="id_kategori" cclass="form-control @error('id_kategori') is-invalid @enderror">
                            @foreach ($kategori as $katItem)
                                @php
                                    $selected = $katItem->id_kategori == $berita->id_kategori ? 'selected' : '';
                                @endphp
                                <option value="{{ $katItem->id_kategori }}" {{ $selected }}>
                                    {{ $katItem->nama_kategori }}
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi</label>
                        <textarea name="isi" id="editor" class="form-control @error('isi') is-invalid @enderror">{{ $berita->isi }}</textarea>
                        @error('isi')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                            accept="image/*" onchange="tampilPreview(this, 'tampilGambar')">
                        @error('gambar')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                        <p></p>
                        <img src="{{ asset('storage/berita/' . $berita->gambar) }}" id="tampilGambar"
                            onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg'"
                            alt="Gambar Banner Berita" width="15%">
                    </div>
                    <input type="hidden" name="id_berita" value="{{ $berita->id_berita }}">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="{{ route(auth()->user()->role . '.berita.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    @endsection
