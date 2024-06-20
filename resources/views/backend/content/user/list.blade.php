@extends('backend.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">List User</h1>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Tambah</a>
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
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', $user->id_user) }}" class="btn btn-sm btn-secondary"><i
                                                class="fa fa-edit"></i> Ubah</a>
                                        <form action="{{ route('admin.user.destroy', $user->id_user) }}"
                                            method 
                                        ="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Anda yakin ingin menghapus user ini?')">
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
