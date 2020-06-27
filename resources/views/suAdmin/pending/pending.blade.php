@extends('masterLay')

@section('title')
   Kelas
@endsection

@section('content')

<!-- TABLE HOVER -->
<div class="panel">
   <div class="panel-heading">
      <h4 class="panel-title">Data Pendaftar</h4>
   </div>
   <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-hover">
         <thead>
            <tr>
               <th>#</th>
               <th>Nama Pendaftar</th>
               <th>Email Pendaftar</th>
               <th>Tanggal Pendaftar</th>
               <th>Alamat</th>
               <th>No.Telepon</th>
               <th colspan="2" style="text-align: center">Aksi</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($pendings as $pending)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pending['nama']}}</td>
                <td>{{$pending['email']}}</td>
                <td>{{$pending['created_at']->format('d-F-Y')}}</td>
                @if ($pending['alamat'] == null)
                <td>Belum Diisi</td>
                  @else 
                  <td>{{$pending['alamat']}}</td>   
                  @endif
                  @if ($pending['no_telp'] == null)
                     <td> Belum Diisi </td>
                  @else
                  <td>{{$pending['no_telp']}}</td>
                  @endif
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
            </tr>
            @endforeach
         </tbody>
      </table>
     </div>
       {{ $pendings->links() }}
   </div>
</div>
<!-- END TABLE HOVER -->
@endsection