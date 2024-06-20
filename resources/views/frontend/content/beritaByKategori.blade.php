@extends('frontend.layout.main')
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid my-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">{{ $kategori->nama_kategori ?? '' }}</h4>
                            </div>
                        </div>
                        @if (isset($kategori) && $beritaByKategori->isEmpty())
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    Berita tidak ditemukan untuk kategori ini.
                                </div>
                            </div>
                        @else
                            @foreach ($beritaByKategori as $item)
                                <div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        <img class="img-fluid w-100" src="{{ asset('storage/berita/' . $item->gambar) }}"
                                            style="object-fit: cover;">
                                        <div class="bg-white border border-top-0 p-4">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                    href="#">{{ $item->kategori->nama_kategori ?? '' }}</a>
                                                <span
                                                    class="text-body"><small>{{ $item->created_at->format('d M Y') }}</small></span>
                                            </div>
                                            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                                href="{{ route('home.detailBerita', $item->slug) }}">{{ $item->judul }}</a>
                                            <p class="m-0">{{ Str::limit(strip_tags($item->isi), 100) }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle mr-2" src="{{ asset('assets-fe/img/user.png') }}" width="25"height="25" alt="Image">
                                                <small>{{ $item->user->name ?? '' }}</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <small class="ml-3"><i
                                                        class="far fa-eye mr-2"></i>{{ $item->total_views }}</small>

                                                <small class="ml-3"><i
                                                        class="far fa-comment mr-2"></i>{{ $item->komentar_count }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Positive Quotes Start -->
                    @include('frontend.includes.positiveQuotes')
                    <!-- Positive Quotes End -->

                    <!-- Kategori Start -->
                    @include('frontend.includes.kategori')
                    <!-- Kategori End -->

                    <!-- Berita Populer Start -->
                    @include('frontend.includes.beritaPopuler')
                    <!-- Berita Populer End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
