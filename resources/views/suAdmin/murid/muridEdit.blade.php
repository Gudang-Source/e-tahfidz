@extends('masterLay');

@section('title')
    Edit Data Pengajar
@endsection

@section('content')
<h1 style="text-align: center">Update Data</h1>
    
<div class="row" style="margin-top: 3%;">
   <div class="col-md-6">
     <form action="{{route('suAdmin.murid.edit',$murid)}}" method="post">
      @method('put')
      @csrf
        <div class="form-group">
           <label for="">Nama Murid</label>
           <input type="text" name="nama" class="form-control" readonly value="{{$murid['nama']}}">
        </div>
        <div class="form-group">
           <label for="">Email Murid</label>
           <input type="email" name="email" class="form-control" value="{{$murid['email']}}">
        </div>
        <button class="btn btn-grad"><i class="fa a-edit"></i> Update Data</button>
     </form>
   </div>

   <div class="col-md-6">
      <form action="{{route('suAdmin.murid.edit.password',$murid)}}" method="post">
         @include('suAdmin.edit.editPw')
      </form>
   </div>

</div>

    
@endsection