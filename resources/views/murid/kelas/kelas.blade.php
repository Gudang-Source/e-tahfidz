@extends('masterLay')

@section('title')
   Kelas {{$class[0]['nama_kelas']}}
@endsection

@section('content')
  <div class="panel panel-default">

   <div class="panel-heading btn-grad" style="color:white">
      <i class="lnr lnr-enter"></i> Kelas {{$class[0]['nama_kelas']}}
   </div>
   <div class="panel-body">
      <!-- TABLE HOVER -->
      <div class="panel">
         <div class="panel-heading">
            <h3 class="panel-title">Data Kelas {{$class[0]['nama_kelas']}}</h3>
         </div>
         <div class="panel-body">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Nama</th>
                  </tr>
               </thead>
              <tbody>
                 @foreach ($students as $student)
                 <tr>
                     <td>{{$loop->iteration}}</td>
                     <td>{{$student['nama']}}</td>
                  </tr>
                 @endforeach
              </tbody>
            </table>
         </div>
      </div>
      <!-- END TABLE HOVER -->
   </div>

  </div>
@endsection