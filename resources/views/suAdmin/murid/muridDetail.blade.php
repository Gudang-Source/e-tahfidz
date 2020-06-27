@extends('masterLay')

@section('title')
   Detail Murid
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
                     <span class="number">{{$dataMurid[0]['nama']}}</span>
                     <span class="title">Nama Murid</span>
                  </p>
               </div>
            </div>
            <div class="col-md-6">
               <div class="metric">
                  <span class="icon"><i class="fa fa-university"></i></span>
                  <p>
                     <span class="number">{{count($kelas_murid)}}</span>
                     <span class="title">Jumlah Kelas Yg Diikuti</span>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- END OVERVIEW -->   
   <hr>
  <div class="panel">
     <div class="panel-heading">
      <h4>
         <i class="fa fa-university"></i> Kelas Yang Diikuti {{$dataMurid[0]['nama']}}  
       </h4>
      </div>
     <div class="panel-body">
        <div class="row">
         @foreach ($kelas_murid as $kls)
         <div class="col-md-6">
            <div class="metric">
               <span class="icon"><i class="fa fa-university"></i></span>
               <p>
                  <span class="number">{{$kls[0]['nama_kelas']}}</span>
                  <span class="title">Nama Kelas</span>
               </p>
            </div>
         </div>
         @endforeach
      </div>
     </div>
  </div>
@endsection