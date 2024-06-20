@extends('backend.layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Form Ubah Menu</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.menu.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Menu</label>
                        <input type="text" name="nama_menu" value="{{ $menu->nama_menu }}"
                            class="form-control @error('nama_menu') is-invalid @enderror" placeholder="Nama Menu">
                        @error('nama_menu')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Menu</label>
                        <div class="radio">
                            <input type="radio" value="url" name="jenis_menu" id="url"
                                {{ $menu->jenis_menu == 'url' ? 'checked' : '' }}>
                            <label>URL</label>
                        </div>
                        @error('jenis_menu')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">URL</label>
                        <div id="url_tampil" style="{{ $menu->jenis_menu == 'url' ? '' : 'display: none;' }}">
                            <input type="text" name="link_menu" id="link_menu"
                                value="{{ $menu->jenis_menu == 'url' ? $menu->link_menu : '' }}" class="form-control"
                                placeholder="URL">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Target Menu</label>
                        <div class="radio">
                            <input type="radio" value="_self" name="target_menu" id="self"
                                {{ $menu->target_menu == '_self' ? 'checked' : '' }}>
                            <label>Tab Saat Ini</label>
                            <input type="radio" value="_blank" name="target_menu" id="blank"
                                {{ $menu->target_menu == '_blank' ? 'checked' : '' }}>
                            <label>Tab Baru</label>
                        </div>
                        @error('jenis_menu')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Parent Menu</label>
                        <select name="parent_menu" class="form-control" id="parent_menu">
                            <option selected value="">Pilih Parent</option>
                            @foreach ($parent as $parentItem)
                                <option value="{{ $parentItem->id_menu }}"
                                    {{ $menu->parent_menu == $parentItem->id_menu ? 'selected' : '' }}>
                                    {{ $parentItem->nama_menu }}</option>
                            @endforeach
                        </select>
                        @error('jenis_menu')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Menu</label>
                        <select name="status_menu" class="form-control" id="status_menu">
                            <option value="1" {{ $menu->status_menu == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ $menu->status_menu == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('jenis_menu')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>

                    <input type="hidden" name="id_menu" value="{{ $menu->id_menu }}">
                    <input type="hidden" id="jenis_menu_old" value="{{ $menu->jenis_menu }}">
                    <input type="hidden" id="url_menu_old" value="{{ $menu->link_menu }}">
                    <input type="hidden" id="target_menu_old" value="{{ $menu->target_menu }}">
                    <input type="hidden" id="parent_menu_old" value="{{ $menu->parent_menu }}">

                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>

        <script>
            $(function() {

                $("#parent_menu_old").val($("#parent_menu_old").val());

                let target_menu_old = $("#target_menu_old").val();
                if (target_menu_old == '_self') {
                    $("#self").prop("checked", "true");
                } else {
                    $("#blank").prop("checked", "true");
                }

                let jenis_menu_old = $("#jenis_menu_old").val();

                $("#url").prop("checked", "true");

                $("#link_menu").val($("#url_menu_old").val());
                $("#url_tampil").css("display", "block");
                $("#page_tampil").css("display", "none");


                $("#url").click(function() {
                    $("#url_tampil").css("display", "block");
                });
            });
        </script>
    @endsection
