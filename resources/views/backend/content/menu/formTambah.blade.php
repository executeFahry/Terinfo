@extends('backend.layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Form Tambah Menu</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.menu.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Menu</label>
                        <input type="text" name="nama_menu" value="{{ old('nama_menu') }}"
                            class="form-control @error('nama_menu') is-invalid @enderror" placeholder="Nama Menu">
                        @error('nama_menu')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Menu</label>
                        <div class="radio">
                            <input type="radio" value="url" name="jenis_menu" id="url">
                            <label>URL</label>

                        </div>
                        @error('jenis_menu')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">URL</label>
                        <div id="url_tampil">
                            <input type="text" name="link_menu" class="form-control" value="{{ old('link_menu') }}"
                                placeholder="URL">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Target Menu</label>
                        <div class="radio">
                            <input type="radio" checked value="_self" name="target_menu" id="self">
                            <label>Tab Saat Ini</label>
                            <input type="radio" value="_blank" name="target_menu" id="blank">
                            <label>Tab Baru</label>
                        </div>
                        @error('jenis_menu')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parent Menu</label>
                        <select name="parent_menu" class="form-control" id="parent_menu">
                            <option value="" selected>Pilih Parent</option>
                            @foreach ($parent as $parentItem)
                                <option value="{{ $parentItem->id_menu }}">{{ $parentItem->nama_menu }}</option>
                            @endforeach
                        </select>
                        @error('jenis_menu')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>

        <script>
            $(function() {
                $("#url_tampil").css("display", "none");
                $("#url").click(function() {
                    $("#url_tampil").css("display", "block");
                });

            });
        </script>
    @endsection
