@extends('frontend.layout.main')

@push('css')
    @livewireStyles
@endpush
@push('js')
    @livewireScripts
@endpush

@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @livewire('berita-loader')
                </div>
                <div class="col-lg-4">
                    <!-- Kategori Start -->
                    @include('frontend.includes.kategori')
                    <!-- Kategori End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
