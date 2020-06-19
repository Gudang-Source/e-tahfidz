@extends('authLay')

@section('title')
    Login
@endsection

@section('auth')
<div class="limiter">
   <div class="container-login100" style="background-image: url('/assets_front/img/hero-home.webp');">
      <div class="wrap-login100 p-t-30 p-b-50" style="width:50%;">
         <span class="login100-form-title p-b-41">
            Account Login
         </span>
         <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="{{route('login')}}">
            @csrf
            <div class="wrap-input100 validate-input" data-validate = "Masukan Email Yang Benar">
               <input class="input100" type="email" name="email" placeholder="Email">
               <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Masukan Password Yang Benar">
               <input class="input100" type="password" name="password" placeholder="Password">
               <span class="focus-input100" data-placeholder="&#xe80f;"></span>
            </div>

            <div class="container-login100-form-btn m-t-32">
               <a href="{{route('welcome')}}" class="btn btn-grad mr-4"><i class="fa fa-home"></i></a>
               <button class="btn btn-grad">
                  Login
               </button>
               <a href="{{route('register')}}" class="btn btn-grad ml-4">Registrasi ?</a>
            </div>

         </form>
      </div>
   </div>
</div>
@endsection