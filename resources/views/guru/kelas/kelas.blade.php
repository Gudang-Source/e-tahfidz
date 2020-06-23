@extends('masterLay')

@section('title')
   Kelas {{$class}}
@endsection

@section('content')
  <div class="panel panel-default">

   <div class="panel-heading btn-grad" style="color:white">
      <i class="lnr lnr-enter"></i> Kelas {{$class}}
   </div>
   <div class="panel-body">
      <!-- TABLE HOVER -->
      <div class="panel">
         <div class="panel-heading">
            <h3 class="panel-title">Data Kelas {{$class}}</h3>
         </div>
         <div class="panel-body">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Nama</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
              <tbody>
                 @if (isset($students))
                 @foreach ($students as $murid)
                 <tr>
                     <td>{{$loop->iteration}}</td>
                     <td>{{$murid['nama']}}</td>
                     <td><a href="{{route('suAdmin.siswa.note',$murid)}}" class="btn btn-grad"><i class="fa fa-sticky-note"></i></a></td>
                  </tr>                  
                 @endforeach
                 @else 

                 @endif
                
              </tbody>
            </table>
         </div>
      </div>
      <!-- END TABLE HOVER -->
   </div>

  </div>
@endsection