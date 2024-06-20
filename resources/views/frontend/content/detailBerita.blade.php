@extends('frontend.layout.main')

@push('css')
    @livewireStyles
@endpush

@push('js')
    @livewireScripts
    <script>
        Livewire.on('komentarAdded', komentarId => {
            var commentScroll = document.getElementById('komentar-' + komentarId);
            commentScroll.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
            }, true);
        });
    </script>
@endpush

@section('content')
    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 180px;">
                            <h4 class="m-0 text-uppercase font-weight-bold">Trending</h4>
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                            style="width: calc(100% - 180px); padding-right: 100px;">
                            @foreach ($mostViewedNews as $mostViewedNewsItem)
                                <div class="text-truncate">
                                    <a class="text-secondary text-uppercase font-weight-semi-bold"
                                        href="{{ route('home.detailBerita', $mostViewedNewsItem->slug) }}">
                                        {{ $mostViewedNewsItem->judul }}: <span class="font-weight-light">
                                            {{ Str::limit(strip_tags($mostViewedNewsItem->isi), 80) }}
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="{{ asset('storage/berita/' . $berita->gambar) }}"
                            style="object-fit: cover;" alt="{{ $berita->judul }}">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">{{ $berita->kategori->nama_kategori }}</a>
                                <span class="text-body">
                                    {{ $berita->created_at->format('d M Y') }}
                                </span>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $berita->judul }}</h1>
                            <p>{!! $berita->isi !!}</p>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="{{ asset('assets-fe/img/user.png') }}" width="25"
                                    height="25" alt="">
                                <span>{{ $berita->user->name }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2"></i>{{ $berita->total_views }}</span>
                                <span class="ml-3"><i
                                        class="far fa-comment mr-2"></i>{{ $berita->komentar_count }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    @livewire('komentar', ['id_berita' => $berita->id_berita])
                    <!-- Comment List End -->
                </div>

                <div class="col-lg-4">

                    <!-- Kategori Start -->
                    @include('frontend.includes.kategori')
                    <!-- Kategori End -->

                    <!-- Positive Quotes Start -->
                    @include('frontend.includes.positiveQuotes')
                    <!-- Positive Quotes End -->

                    <!-- Berita Populer Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Berita Populer</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            @foreach ($mostViewedNewsSide as $mostViewedNewsItem)
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    <img class="img-fluid"
                                        src="{{ asset('storage/berita/' . $mostViewedNewsItem->gambar) }}"
                                        alt="{{ $mostViewedNewsItem->judul }}" width="110px" height="110px">
                                    <div class="h-100 px-3 d-flex flex-column justify-content-center border border-left-0"
                                        style="min-width: 65% !important">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                                href="{{ strtolower(route('home.beritaByKategori', $mostViewedNewsItem->kategori->nama_kategori)) }}">{{ $mostViewedNewsItem->kategori->nama_kategori }}</a>
                                            <span
                                                class="text-body"><small>{{ $mostViewedNewsItem->created_at->format('d M Y') }}</small></span>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                            style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 80%; display: block;"
                                            href="{{ route('home.detailBerita', $mostViewedNewsItem->slug) }}">{{ $mostViewedNewsItem->judul }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Berita Populer End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
