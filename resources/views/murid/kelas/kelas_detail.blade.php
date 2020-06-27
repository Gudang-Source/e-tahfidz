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
            <div class="col-md-4">
               <div class="metric">
                  <span class="icon"><i class="fa fa-university"></i></span>
                  <p>
                     <span class="number">{{$class->nama_kelas}}</span>
                     <span class="title">Nama Kelas</span>
                  </p>
               </div>
            </div>
            <div class="col-md-4">
               <div class="metric">
                  <span class="icon"><i class="fa fa-user"></i></span>
                  <p>
                     <span class="number">
                       {{$class->pengajar->nama}}
                     </span>
                     <span class="title">Nama Pengajar</span>
                  </p>
               </div>
            </div>
            <div class="col-md-4">
               <div class="metric">
                  <span class="icon"><i class="fa fa-users"></i></span>
                  <p>
                     <span class="number">
                       @if (Auth::user()->role == "murid")
                       {{count($data)}}
                       @else
                       {{count($murids)}}
                       @endif
                     </span>
                     <span class="title">Jumlah Murid</span>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="panel">
      <div class="panel-heading btn-grad">
         Daftar Siswa Kelas {{$class->nama_kelas}}
      </div>
      @if (Auth::user()->role == "murid")
      <div class="panel-body">
         <div class="table-responsive">
            <table class="table table-hover">
               <tr>
                  <td>#</td>
                  <td>Nama Murid</td>
               </tr>
               @foreach ($data as $dat)
                   <tr>
                     <td>{{$loop->iteration}}</td>
                     <td>{{$dat['nama']}}</td>
                   </tr>
               @endforeach
            </table>
         </div>
      </div>
      @endif

      @if (Auth::user()->role == "pengajar")
      <div class="panel-body">
         <div class="table-responsive">
            <table class="table table-hover">
               <tr>
                  <td>#</td>
                  <td>Nama Murid</td>
                  <td>Catatan</td>
               </tr>
               @foreach ($murids as $murid)
                   <tr>
                     <td>{{$loop->iteration}}</td>
                     <td>{{$murid['nama']}}</td>
                     <td><a href="{{route('suAdmin.siswa.note',$murid)}}" class="btn btn-grad"><i class="fa fa-sticky-note"></i></a></td>
                   </tr>
               @endforeach
            </table>
         </div>
      </div>
      @endif
   </div>
@endsection