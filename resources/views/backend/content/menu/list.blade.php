@extends('backend.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">List Menu</h1>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{ route('admin.menu.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Tambah</a>
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
                                <th>Nama Menu</th>
                                <th>Status Menu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($menu as $key => $menuItem)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $menuItem->nama_menu }}<br>
                                        <ul>
                                            @foreach ($menuItem->subMenu as $subKey => $subMenu)
                                                <li>
                                                    {{ $subMenu->nama_menu }}

                                                    <a href="{{ route('admin.menu.edit', $subMenu->id_menu) }}">
                                                        <i class="fa fa-edit text-secondary"></i>
                                                    </a>
                                                    <form action="{{ route('admin.menu.destroy', $subMenu->id_menu) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            style="border: none; background: none; cursor: pointer;">
                                                            <i class="fa fa-trash text-secondary"></i>
                                                        </button>
                                                    </form>

                                                    <span {{ $subMenu->status_menu == 0 ? '(Tidak Aktif)' : '' }}></span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        @if ($menuItem->status_menu == 1)
                                            <span class="badge badge-pill badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.menu.edit', $menuItem->id_menu) }}"
                                            class="btn btn-sm btn-secondary">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>

                                        <form action="{{ route('admin.menu.destroy', $menuItem->id_menu) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Anda yakin ingin menghapus menu ini?')">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>

                                        {{-- Tombol untuk mengurutkan menu --}}
                                        @if (!$loop->first)
                                            @php
                                                $prevKeyMenu = $key - 1;
                                                $prevIdMenu = $menu->get($prevKeyMenu)->id_menu ?? null;
                                            @endphp
                                            @if ($prevIdMenu)
                                                <a href="{{ route('admin.menu.order', [$menuItem->id_menu, $prevIdMenu]) }}"
                                                    class="btn btn-sm btn-secondary">
                                                    <i class="fa fa-arrow-up"></i>
                                                </a>
                                            @endif
                                        @endif

                                        @if (!$loop->last)
                                            @php
                                                $nextKeyMenu = $key + 1;
                                                $nextIdMenu = $menu->get($nextKeyMenu)->id_menu ?? null;
                                            @endphp
                                            @if ($nextIdMenu)
                                                <a href="{{ route('admin.menu.order', [$menuItem->id_menu, $nextIdMenu]) }}"
                                                    class="btn btn-sm btn-secondary">
                                                    <i class="fa fa-arrow-down"></i>
                                                </a>
                                            @endif
                                        @endif
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
