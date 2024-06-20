@extends('frontend.layout.main')
@section('content')
<!-- Contact Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Kontak Terinfo</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <div class="mb-4">
                           <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-envelope-open text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">Email</h6>
                                 </div>
                                 <p class="m-0">info@terinfo.com</p>
                              </div>
                              <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-phone-alt text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">Hubungi Kami</h6>
                                </div>
                                <p class="m-0">+62 8818087 598</p>
                            </div>
                            <div class="mb-3">
                                       <div class="d-flex align-items-center mb-2">
                                           <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                           <h6 class="font-weight-bold mb-0">Kantor Terinfo</h6>
                                       </div>
                                       <p class="m-0">Lowokwaru, Malang, Indonesia</p>
                                   </div>
                                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15805.583310195017!2d112.61207646860393!3d-7.957982545759811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629d276830f81%3A0x7e624ea583e0244b!2sLowokwaru%2C%20Kec.%20Lowokwaru%2C%20Kota%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1718462922541!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        @include('frontend.includes.about')
                        @include('frontend.includes.kategori')
                  </div>
               </div>
            </div>
    </div>
    <!-- Contact End -->
@endsection
