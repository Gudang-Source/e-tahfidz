@extends('masterLay')

@section('title')
    Edit Data Pengajar
@endsection

@section('content')
<div class="panel panel-default">
   <div class="panel-heading btn-grad" style="color:white">
      <i class="fa fa-edit"></i> Update Data
   </div>
   <div class="panel-body">
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
                  {!!$errors->first('email','<span class="text-danger">:message</span>')!!}
               </div>
               <div class="form-group">
                  <label for="">No.Telepon</label>
                  <input type="text" name="no_telp" value="{{$pjr['no_telp']}}" placeholder="Masukan Nomor Telepon"  class="form-control">
               </div>
               <div class="form-group">
                  <label for="">Alamat</label>
                  <input type="text" name="alamat" value="{{$pjr['alamat']}}" placeholder="Masukan Alamat Pengajar" class="form-control">
               </div>
              <button type="submit" class="btn btn-grad"><i class="fa fa-edit"></i> Update Data</button>
            </form>
         </div>
      
         <div class="col-md-6">
            <form action="{{route('suAdmin.edit.password',$pjr)}}" method="post">
              @include('suAdmin.edit.editPw')
            </form>
         </div>
      
      </div>
   </div>
</div>

    
@endsection