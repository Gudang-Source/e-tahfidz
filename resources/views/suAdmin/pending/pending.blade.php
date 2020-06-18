@extends('masterLay')

@section('title')
   Kelas
@endsection

@section('content')

<!-- TABLE HOVER -->
<div class="panel">
   <div class="panel-heading">
      <h3 class="panel-title">Data Pendaftar</h3>
   </div>
   <div class="panel-body">
      <table class="table table-hover">
         <thead>
            <tr>
               <th>#</th>
               <th>Nama Pendaftar</th>
               <th>Email Pendaftar</th>
               <th>Tanggal Pendaftar</th>
               <th colspan="2" style="text-align: center">Aksi</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($pendings as $pending)
                <td>{{$loop->iteration}}</td>
                <td>{{$pending['nama']}}</td>
                <td>{{$pending['email']}}</td>
                <td>{{$pending['created_at']->format('d-F-Y')}}</td>
                <td style="text-align: center;">
                  <form action="{{route('suAdmin.confir',$pending)}}" method="post">
                     @csrf
                     <button class="btn btn-grad"><i class="fa fa-check"></i></button>
                  </form>
                </td>
                <td>
                  <form action="">
                     @method('delete')
                     <button class="btn btn-grad"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
            @endforeach
         </tbody>
       {{ $pendings->links() }}
   </div>
</div>
<!-- END TABLE HOVER -->
@endsection