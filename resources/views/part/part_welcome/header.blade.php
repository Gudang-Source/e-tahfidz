<header id="header" class="fixed-top">
   <div class="container d-flex align-items-center">

     {{-- <h1 class="logo mr-auto"><a href="{{route('welcome')}}">Tahidz Online</a></h1> --}}
     <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{route('welcome')}}" class="logo mr-auto"><img src="/logo.png" alt="" class="img-fluid"></a>

     <nav class="nav-menu d-none d-lg-block">
       <ul>
         <li class="active"><a href="{{route('welcome')}}">Home</a></li>
         <li><a href="#info">Informasi</a></li>
         <li><a href="#about">Tentang Kami</a></li>
       </ul>
     </nav><!-- .nav-menu -->

     <a href="{{route('login')}}" class="get-started-btn scrollto">Mulai Belajar</a>

   </div>
 </header><!-- End Header -->