@extends('masterLay')

@section('title')
    Edit Data Murid
@endsection

@section('content')

<div class="panel panel-default">
   <div class="panel-heading btn-grad" style="color:white">
      <i class="fa fa-edit"></i> Update Data
   </div>
   <div class="panel-body">
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
                  {!!$errors->first('email','<span class="text-danger">:message</span>')!!}
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="">No.Telepon</label>
                        <input type="text" name="no_telp" placeholder="Masukan No.Telepon" value="{{$murid['no_telp']}}" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" placeholder="Masukan Alamat" value="{{$murid['alamat']}}" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="">Nis</label>
                  <input type="text" name="nis" value="{{$murid['nis']}}" placeholder="Masukan NIS Siswa" class="form-control">
               </div>
              <button class="btn btn-grad"><i class="fa fa-edit"></i> Update Data</button>
           </form>
         </div>
      
         <div class="col-md-6">
            <form action="{{route('suAdmin.murid.edit.password',$murid)}}" method="post">
               @include('suAdmin.edit.editPw')
            </form>
         </div>
      
      </div>
   </div>
</div>
@endsection

    

    