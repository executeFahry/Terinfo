<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Kategori</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <div class="d-flex flex-wrap m-n1">
            @foreach ($kategoriAll as $katItem)
                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 m-1"
                    href="{{ strtolower(route('home.beritaByKategori', $katItem->nama_kategori)) }}">
                    {{ $katItem->nama_kategori }}
                </a>
            @endforeach
        </div>
    </div>
</div>
