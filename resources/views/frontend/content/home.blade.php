@extends('frontend.layout.main')
@section('content')
    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    @foreach ($latestNews as $latestNewsItem)
                        <div class="position-relative overflow-hidden" style="height: 500px;">
                            <img class="img-fluid h-100" src="{{ asset('storage/berita/' . $latestNewsItem->gambar) }}"
                                style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="{{ strtolower(route('home.beritaByKategori', $latestNewsItem->kategori->nama_kategori)) }}">{{ $latestNewsItem->kategori->nama_kategori }}</a>
                                    <span
                                        class="text-white"><small>{{ $latestNewsItem->created_at->format('d M Y') }}</small></span>
                                </div>
                                <a class="h2 m-0 text-white text-uppercase font-weight-bold"
                                    href="{{ route('home.detailBerita', $latestNewsItem->slug) }}">{{ $latestNewsItem->judul }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    @foreach ($latestNews as $latestNewsItem)
                        <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img class="img-fluid w-100 h-100"
                                    src="{{ asset('storage/berita/' . $latestNewsItem->gambar) }}"
                                    style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="{{ strtolower(route('home.beritaByKategori', $latestNewsItem->kategori->nama_kategori)) }}">{{ $latestNewsItem->kategori->nama_kategori }}</a>
                                        <span
                                            class="text-white"><small>{{ $latestNewsItem->created_at->format('d M Y') }}</small></span>
                                    </div>
                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                        href="{{ route('home.detailBerita', $latestNewsItem->slug) }}">{{ $latestNewsItem->judul }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- Berita Unggulan Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Berita Unggulan</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                @foreach ($mostViewedNews as $mostViewedNewsItem)
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid h-100" src="{{ asset('storage/berita/' . $mostViewedNewsItem->gambar) }}"
                            style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="{{ strtolower(route('home.beritaByKategori', $mostViewedNewsItem->kategori->nama_kategori)) }}">{{ $mostViewedNewsItem->kategori->nama_kategori }}</a>
                                <span
                                    class="text-white"><small>{{ $mostViewedNewsItem->created_at->format('d M Y') }}</small></span>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                href="{{ route('home.detailBerita', $mostViewedNewsItem->slug) }}">{{ $mostViewedNewsItem->judul }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Berita Unggulan Slider End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Berita Terkini</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none"
                                    href="{{ route('home.berita') }}">Lihat Semua
                                    <i class="fas fa-expand-arrows-alt"></i>
                                </a>
                            </div>
                        </div>
                        @foreach ($homeLatestNews as $latestNewsItem)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100"
                                        src="{{ asset('storage/berita/' . $latestNewsItem->gambar) }}"
                                        style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="{{ strtolower(route('home.beritaByKategori', $latestNewsItem->kategori->nama_kategori)) }}">{{ $latestNewsItem->kategori->nama_kategori }}</a>
                                            <span
                                                class="text-body"><small>{{ $latestNewsItem->created_at->format('d M Y') }}</small></span>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                            href="{{ route('home.detailBerita', $latestNewsItem->slug) }}">{{ $latestNewsItem->judul }}</a>
                                        <p class="m-0">{{ Str::limit(strip_tags($latestNewsItem->isi), 100) }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="{{ asset('assets-fe/img/user.png') }}"
                                                width="25" height="25" alt="Image">
                                            <small>{{ $latestNewsItem->user->name }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i
                                                    class="far fa-eye mr-2"></i>{{ $latestNewsItem->total_views }}</small>
                                            <small class="ml-3"><i
                                                    class="far fa-comment mr-2"></i>{{ $latestNewsItem->komentar_count }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Kategori Start -->
                    @include('frontend.includes.about')
                    <!-- Kategori End -->

                    <!-- Kategori Start -->
                    @include('frontend.includes.kategori')
                    <!-- Kategori End -->

                    <!-- Positive Quotes Start -->
                    @include('frontend.includes.positiveQuotes')
                    <!-- Positive Quotes End -->

                    <!-- Berita Populer Start -->
                    @include('frontend.includes.beritaPopuler')
                    <!-- Berita Populer End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
