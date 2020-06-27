@extends('masterLay')

@section('title')
   Murid
@endsection

@section('content')

<!-- TABLE HOVER -->
<div class="panel">
   <div class="panel-heading">
      <h3 class="panel-title">Data Murid</h3>
   </div>
   <div class="panel-body">
     <div class="row">
        <div class="col-md-4">
         <form action="{{route('murid.search')}}" method="get">
           @include('suAdmin.search.search')
         </form>
        </div>
     </div>
     <br>
     <div class="table-responsive">
      <table class="table table-hover">
         <thead>
            <tr>
               <th>#</th>
               <th>Nama Murid</th>
               <th>Email</th>
               <th>Alamat</th>
               <th>No.Telepon</th>
               <th colspan="3" style="text-align: center">Aksi</th>
            </tr>
         </thead>
         @foreach ($murids as $murid)
            <tr>
               <td>{{$loop->iteration}}</td>
               <td>{{$murid->nama}}</td>
               <td>{{$murid->email}}</td>
               @if ($murid['alamat'] == null)
                     <td>Belum Diisi</td>
                  @else 
                  <td>{{$murid['alamat']}}</td>   
                 @endif
                 @if ($murid['no_telp'] == null)
                    <td> Belum Diisi </td>
                  @else
                  <td>{{$murid['no_telp']}}</td>
                 @endif
               <td style="text-align: center">
                  <a href="{{route('suAdmin.murid.edit',$murid)}}" class="btn btn-grad"><i class="fa fa-edit"></i></a>
               </td>
               <td style="text-align: center">
                  <form action="{{route('suAdmin.murid.destroy',$murid)}}" method="post">
                     @method('delete')
                     @csrf
                     <button onclick="return confirm('Yakin Akan Menghapus Murid Ini')" class="btn btn-grad"><i class="fa fa-trash"></i></button>
                  </form>
               </td>
               <td style="text-align: center">
                  <a href="{{route('suAdmin.murid.detail',$murid)}}" class="btn btn-grad"><i class="fa fa-search-plus"></i></a>
               </td>
            </tr>
         @endforeach
      </table>
     </div>
   {{ $murids->links() }}
   </div>
</div>
<!-- END TABLE HOVER -->

@endsection