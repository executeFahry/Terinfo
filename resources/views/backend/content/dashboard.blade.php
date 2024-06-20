 @extends('backend.layout.main')
 @section('content')
     <div class="container-fluid">

         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
         </div>

         @if(auth()->user()->role == 'admin' || auth()->user()->role == 'penulis')
         <!-- Content Row -->
         <div class="row">
             <div class="col-xl-4 col-md-6 mb-4">
                 <div class="card border-left-primary shadow h-100 py-2">
                     <div class="card-body">
                         <div class="row no-gutters align-items-center">
                             <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                     Total Kategori</div>
                                 <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKategori }}</div>
                             </div>
                             <div class="col-auto">
                                 <i class="fas fa-tags fa-2x text-gray-300"></i>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-xl-3 col-md-6 mb-4">
                 <div class="card border-left-success shadow h-100 py-2">
                     <div class="card-body">
                         <div class="row no-gutters align-items-center">
                             <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                     Total Berita</div>
                                 <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBerita }}</div>
                             </div>
                             <div class="col-auto">
                                 <i class="fas fa-table fa-2x text-gray-300"></i>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         @endif
 
             @if(auth()->user()->role == 'admin')
             <div class="col-xl-3 col-md-6 mb-4">
                 <div class="card border-left-info shadow h-100 py-2">
                     <div class="card-body">
                         <div class="row no-gutters align-items-center">
                             <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total User
                                 </div>
                                 <div class="row no-gutters align-items-center">
                                     <div class="col-auto">
                                         <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalUser }}</div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-auto">
                                 <i class="fas fa-users fa-2x text-gray-300"></i>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             @endif
         </div>

         <!-- Content Row -->
         <div class="row">
             <!-- Content Column -->
             <div class="col-lg-12 mb-4">
                 <div class="card shadow mb-4">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Berita Terbaru</h6>
                     </div>
                     <div class="row">
                         @foreach ($latestBerita as $newestItem)
                             <div class="col-lg-4 col-md-6 col-sm-12">
                                 <div class="card">
                                     <img src="{{ asset('storage/berita/' . $newestItem->gambar) }}" class="card-img-top"
                                         alt="{{ $newestItem->judul }}">
                                     <div class="card-body">
                                         <h5 class="card-title font-weight-bold">{{ $newestItem->judul }}</h5> <br>
                                          @if(auth()->user()->role == 'admin' || auth()->user()->role == 'penulis')
                                            <a href="{{ route(auth()->user()->role . '.berita.edit', $newestItem->id_berita) }}" class="btn btn-primary btn-sm">Edit Berita</a>
                                            @else
                                            <a href="{{ route('home.detailBerita', $newestItem->id_berita) }}" class="btn btn-primary btn-sm">Baca Berita</a>
                                        @endif
                                         <br><br>
                                         <small class="text-muted float-left">{{$newestItem->user->name}}</small>
                                         <small class="text-muted float-right">{{ $newestItem->created_at->diffForHumans() }}</small>
                                     </div>
                                 </div>
                             </div>
                         @endforeach
                     </div>
                 </div>
             </div>

            </div>
     @endsection
