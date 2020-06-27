@extends('masterLay')

@section('title')
   Dashboard
@endsection

@section('content')
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
      <div class="panel-heading">
         <h3 class="panel-title">Panel Data</h3>
         <p class="panel-subtitle">{{date('d-F-Y')}}</p>
      </div>
      <div class="panel-body">
         <div class="row">
            <div class="col-md-6">
               <div class="metric">
                  <span class="icon"><i class="fa fa-user"></i></span>
                  <p>
                     <span class="number">{{Auth::user()->nama}}</span>
                     <span class="title">Nama</span>
                  </p>
               </div>
            </div>
            <div class="col-md-6">
               <div class="metric">
                  <span class="icon"><i class="fa fa-university"></i></span>
                  <p>
                     <span class="number">
                       @if ($kelas[0] == null)
                           0
                        @else
                        {{count($kelas)}}
                       @endif
                     </span>
                     <span class="title">Kelas Yang Diikuti</span>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
                            
   <!-- END OVERVIEW -->   
   <hr>
   <!-- PANEL HEADLINE -->
  <div class="panel panel-default">
   <div class="panel-heading btn-grad" style="color:white">
      <i class="fa fa-info"></i> Ruang Informasi
   </div>
   <hr class="batas">
   <div class="panel-body">
        <!-- PANEL HEADLINE -->
    <div class="row">
      @foreach ($info as $inf)
         <div class="panel panel-headline bs-shadow">
            <div class="panel-heading">
               <h3 class="panel-title">{{$inf['judul']}}</h3>
               <p class="panel-subtitle">Informasi Oleh : {{$inf->user->nama}}</p>
               <small>Ditujukan : {{$inf->visible->visible}}</small> <br>
               <small>Published : {{$inf['created_at']->diffForHumans()}}</small> -
               <small>Updated : {{$inf['updated_at']->diffForHumans()}}</small>
               
            </div>
            <div class="panel-body" style="margin-top: -1%;" >
               <p>{{$inf['info']}}</p>
            </div>

         </div>
         <hr>
       @endforeach    
    </div>
  <!-- END PANEL HEADLINE -->
   </div>
  </div>
@endsection