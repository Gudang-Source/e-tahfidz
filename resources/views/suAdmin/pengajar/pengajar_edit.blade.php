@extends('masterLay');

@section('title')
    Edit Data Pengajar
@endsection

@section('content')
<h1 style="text-align: center">Update Data</h1>
    
<div class="row" style="margin-top: 3%;">
   <div class="col-md-6">
      <form action="{{route('suAdmin.pengajar.edit',$pjr)}}" method="post">
         @csrf
         @method('put')
         <div class="form-group">
            <label for="">Nama Pengajar</label>
            <input type="text" name="nama" value="{{$pjr['nama']}}" readonly class="form-control">
         </div>
         <div class="form-group">
           <label for="">Email</label>
           <input type="text" name="email" value="{{$pjr['email']}}"  class="form-control">
        </div>
        <button type="submit" class="btn btn-grad"><i class="fa fa-edit"></i> Update Data</button>
      </form>
   </div>

   <div class="col-md-6">
      <form action="{{route('suAdmin.edit.password',$pjr)}}" method="post">
         @method('put')
         @csrf
         <div class="form-group">
            <label for="">Password Baru</label>
            <input type="password" name="password" class="form-control" placeholder="Masukan Password Baru">
         </div>
         <div class="form-group">
            <label for="">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation"  class="form-control" placeholder="Konfirmasi Password Baru">
         </div>
         <button type="submit" class="btn btn-grad"><i class="fa fa-edit"></i> Ganti Password</button>
      </form>
   </div>

</div>

    
@endsection