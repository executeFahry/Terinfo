@extends('frontend.layout.main')
@section('content')
<!-- About Us Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Tentang Terinfo</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <h5 class="font-weight-bold mb-3">Selamat Datang di Terinfo!</h5>
                    <p>Terinfo adalah platform informasi yang bertujuan untuk memberikan berita terkini, artikel mendalam, dan konten berkualitas kepada pembaca di seluruh Indonesia. Kami berkomitmen untuk menyediakan informasi yang akurat, relevan, dan terpercaya bagi komunitas kami.</p>
                    <p>Kami percaya bahwa informasi yang baik dapat memberdayakan individu dan komunitas untuk membuat keputusan yang lebih baik. Oleh karena itu, kami berdedikasi untuk menjaga integritas jurnalistik dan terus berusaha untuk memberikan yang terbaik bagi pembaca kami.</p>
                    <h5 class="font-weight-bold mb-3">Misi Kami</h5>
                    <p>Misi kami adalah menjadi sumber informasi utama bagi masyarakat Indonesia dengan menyajikan konten yang bermanfaat dan dapat dipercaya. Kami berusaha untuk:</p>
                    <ul>
                        <li>Menyediakan berita terkini yang akurat dan terpercaya.</li>
                        <li>Menyajikan artikel yang mendalam dan informatif tentang berbagai topik.</li>
                        <li>Membantu pembaca untuk tetap terinformasi dan terhubung dengan dunia sekitar mereka.</li>
                    </ul>
                    <h5 class="font-weight-bold mb-3">Tim Kami</h5>
                    <p>Di Terinfo, kami memiliki tim penulis dan jurnalis yang berdedikasi, yang bekerja keras untuk mengumpulkan dan menyajikan informasi yang paling relevan dan menarik bagi pembaca kami. Tim kami terdiri dari profesional berpengalaman yang memiliki keahlian dalam berbagai bidang, termasuk berita, teknologi, kesehatan, dan gaya hidup.</p>
                </div>
            </div>
            <div class="col-lg-4">
                @include('frontend.includes.kategori')
                @include('frontend.includes.positiveQuotes')
                @include('frontend.includes.beritaPopuler')
            </div>
        </div>
    </div>
</div>
<!-- About Us End -->
@endsection
