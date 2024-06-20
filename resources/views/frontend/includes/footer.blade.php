<div class="container-fluid bg-dark pt-5 px-3 px-sm-5 px-md-5 mt-5">
    <div class="row py-4 text-lg-left">
        <div class="col-lg-4 col-md-4 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
            <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@terinfo.com</p>
            <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+62 881 8087 598</p>
            <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Lowokwaru, Malang, Indonesia</p>
            
        </div>
        <div class="col-lg-4 col-md-4 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Berita Populer</h5>
            @foreach ($footerMostViewedNews as $mostViewedNewsItem)
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                            href="{{ route('home.detailBerita', $mostViewedNewsItem->slug) }}">
                            {{ $mostViewedNewsItem->kategori->nama_kategori }}
                        </a>
                        <a class="text-body"
                            href="{{ route('home.detailBerita', $mostViewedNewsItem->slug) }}">
                            <small>{{ $mostViewedNewsItem->created_at->format('M d, Y') }}</small>
                        </a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium"
                        href="{{ route('home.detailBerita', $mostViewedNewsItem->slug) }}">
                        {{ Str::limit(strip_tags($mostViewedNewsItem->isi), 50) }}
                    </a>
                </div>
            @endforeach
        </div>
        <div class="col-lg-4 col-md-4 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Kategori</h5>
            <div class="m-n1">
                @foreach ($kategoriAll as $katItem)
                    <a href="{{ strtolower(route('home.beritaByKategori', $katItem->nama_kategori)) }}"
                        class="btn btn-sm btn-secondary m-1">{{ $katItem->nama_kategori }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="#">Terinfo</a>. All Rights Reserved.

        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Design by <a href="https://htmlcodex.com">HTML Codex</a>
    </p>
</div>
