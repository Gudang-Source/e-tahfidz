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
      <table class="table table-hover">
         <thead>
            <tr>
               <th>#</th>
               <th>Nama Murid</th>
               <th>Email</th>
               <th colspan="2" style="text-align: center">Aksi</th>
            </tr>
         </thead>
         @foreach ($murids as $murid)
            <tr>
               <td>{{$loop->iteration}}</td>
               <td>{{$murid->nama}}</td>
               <td>{{$murid->email}}</td>
               <td style="text-align: center">
                  <form action="">
                     <button class="btn btn-grad"><i class="fa fa-edit"></i></button>
                  </form>
               </td>
               <td style="text-align: center">
                  <form action="{{route('suAdmin.murid.destroy',$murid)}}" method="post">
                     @method('delete')
                     @csrf
                     <button class="btn btn-grad"><i class="fa fa-trash"></i></button>
                  </form>
               </td>
            </tr>
         @endforeach
         {{ $murids->links() }}
   </div>
</div>
<!-- END TABLE HOVER -->

@endsection