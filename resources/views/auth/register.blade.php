@extends('authLay')

@section('title')
    Registrasi E-Tahfidz
@endsection


@section('auth')
<div class="limiter">
   <div class="container-login100" style="background-image: url('/assets_front/img/hero-home.webp');">
      <div class="wrap-login100 p-t-30 p-b-50" style="width:50%">
         <span class="login100-form-title p-b-41">
            Account Register
         </span>
         <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="{{route('register')}}">
            @csrf
            <div class="wrap-input100 validate-input" data-validate = "Enter username">
               <input class="input100" type="text" name="nama" placeholder="Masukan Nama Lengkap Kamu">
               <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Enter username">
               <input class="input100" type="email" name="email" placeholder="Email">
               <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            </div>

            <div class="row">
               <div class="col-md-6">
                  <div class="wrap-input100 validate-input" data-validate="Masukan Password Kamu">
                     <input class="input100" type="password" name="password" placeholder="Password">
                     <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="wrap-input100 validate-input" data-validate="Konfirmasi Password Kamu">
                     <input class="input100" type="password" name="password_confirmation" placeholder="Konfirmasi Password">
                     <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                  </div>
               </div>
            </div>

            <div class="container-login100-form-btn m-t-32">
               <button class="btn btn-grad">
                  Registrasi
               </button>
               <a href="{{route('login')}}" class="btn btn-grad ml-4">Login ?</a>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
