@extends('backend.layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Form Edit User</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.user.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama User</label>
                        <input type="text" name="name" value="{{ $users->name }}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email User</label>
                        <input type="email" name="email" value="{{ $users->email }}"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role User</label>
                        <select name="role" class="form-control @error('role') is-invalid @enderror" id="roleSelect">
                            <option value="">{{ ucfirst($users->role) }}</option>
                            <option value="admin">Admin</option>
                            <option value="penulis">Penulis</option>
                            <option value="user">User</option>
                        </select>
                        @error('role')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="id" value="{{ $users->id_user }}">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
        <script>
            document.getElementById('roleSelect').addEventListener('click', function() {
                this.options[0].style.display = 'none';
            });
        </script>
    @endsection
