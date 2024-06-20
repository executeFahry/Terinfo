@extends('backend.layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Form Reset Password</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route(auth()->user()->role . '.dashboard.updatePassword') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Password Lama</label>
                        <input type="password" name="old_password" value="{{ old('old_password') }}"
                            class="form-control @error('old_password') is-invalid @enderror">
                        @error('old_password')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="new_password" value="{{ old('new_password') }}"
                            class="form-control @error('new_password') is-invalid @enderror">
                        @error('new_password')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" name="c_new_password" value="{{ old('c_new_password') }}"
                            class="form-control @error('c_new_password') is-invalid @enderror">
                        @error('c_new_password')
                            <span style="color:red; font-weight:600; font-size:9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Reset</button>
                    <a href="{{ route(auth()->user()->role . '.dashboard.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    @endsection