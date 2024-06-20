<div>
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Semua Berita</h4>
            </div>
        </div>
        @foreach ($berita as $beritaItem)
            <div class="col-lg-6">
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="{{ asset('storage/berita/' . $beritaItem->gambar) }}"
                        style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="{{ strtolower(route('home.beritaByKategori', $beritaItem->kategori->nama_kategori)) }}">{{ $beritaItem->kategori->nama_kategori }}</a>
                            <span class="text-body"><small>{{ $beritaItem->created_at->format('d M Y') }}</small></span>
                        </div>
                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                            href="{{ route('home.detailBerita', $beritaItem->slug) }}">{{ $beritaItem->judul }}</a>
                    </div>
                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        <div class="d-flex align-items-center">
                            <small>{{ $beritaItem->user ? $beritaItem->user->name : 'Anonim' }}</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $beritaItem->total_views }}</small>
                            <small class="ml-3"><i
                                    class="far fa-comment mr-2"></i>{{ $beritaItem->komentar_count }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if ($count < $totalBerita)
            <div class="col-12">
                <div class="text-center">
                    <button class="btn btn-primary" wire:click="loadMore">Load More</button>
                    <span wire:loading>Loading...</span>
                </div>
            </div>
        @endif
    </div>
</div>
