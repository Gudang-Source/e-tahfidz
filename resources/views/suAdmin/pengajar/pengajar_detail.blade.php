@extends('masterLay')

@section('title')
   Detail Pengajar
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
                     <span class="number">{{$pengajar[0]['nama']}}</span>
                     <span class="title">Nama Pengajar</span>
                  </p>
               </div>
            </div>
            <div class="col-md-6">
               <div class="metric">
                  <span class="icon"><i class="fa fa-university"></i></span>
                  <p>
                     @if ($kelas !== [])
                     <span class="number">{{count($kelas)}}</span>
                     @else
                     <span class="number">0</span>
                     @endif
                     <span class="title">Jumlah Kelas Yg Diajar</span>
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
         <i class="fa fa-university"></i> Kelas Yang Diajar {{$pengajar[0]['nama']}}  
       </h4>
      </div>
     <div class="panel-body">
        <div class="row">
           @if ($kelas !== [])
           @foreach ($kelas as $kls)
           <div class="col-md-6">
              <div class="metric">
                 <span class="icon"><i class="fa fa-university"></i></span>
                 <p>
                    <span class="number">{{$kls['nama_kelas']}}</span>
                    <span class="title">Nama Kelas</span>
                 </p>
              </div>
           </div>
           @endforeach
           @else
           Kamu Belum Mengajar Kelas Manapun
           @endif
               
      </div>
     </div>
  </div>
@endsection