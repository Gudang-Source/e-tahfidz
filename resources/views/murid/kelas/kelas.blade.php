@extends('masterLay')

@section('title')
   @if (isset($class[0]['nama_kelas']))
      Kelas {{$class[0]['nama_kelas']}}
   @else
      Belum Masuk Kelas 
   @endif
@endsection

@section('content')
  <div class="panel panel-default">

   <div class="panel-heading btn-grad" style="color:white">
      @if (isset($class[0]['nama_kelas']))
      <i class="lnr lnr-enter"></i> Kelas {{$class[0]['nama_kelas']}}
      @else
         Belum Masuk Kelas 
      @endif
   </div>
   <div class="panel-body">
      <!-- TABLE HOVER -->
      <div class="panel">
         <div class="panel-heading">
            @if (isset($class[0]['nama_kelas']))
            <h3 class="panel-title">Data Kelas {{$class[0]['nama_kelas']}}</h3>
            @else
               Kelas 
            @endif   
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
            
      