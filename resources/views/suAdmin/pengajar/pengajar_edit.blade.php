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
            {!!$errors->first('email','<span class="text-danger">:message</span>')!!}
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

    
@endsection