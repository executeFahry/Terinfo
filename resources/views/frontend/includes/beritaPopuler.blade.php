 <div class="mb-3">
     <div class="section-title mb-0">
         <h4 class="m-0 text-uppercase font-weight-bold">Berita Populer</h4>
     </div>
     <div class="bg-white border border-top-0 p-3">
         @foreach ($mostViewedNews as $mostViewedNewsItem)
             <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                 <img class="img-fluid" src="{{ asset('storage/berita/' . $mostViewedNewsItem->gambar) }}"
                     alt="{{ $mostViewedNewsItem->judul }}" width="110px" height="110px">
                 <div class="h-100 px-3 d-flex flex-column justify-content-center border border-left-0" style="min-width: 65% !important">
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
