@extends('masterLay')

@section('title')
    Edit Informasi
@endsection

@section('content')
    <div class="panel panel-default">
       <div class="panel-heading btn-grad" style="color:white">
          <i class="fa fa-edit"></i> Update Informasi
       </div>
      <div class="panel-body">
         <form action="{{route('suAdmin.info.edit', $inf)}}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
               <label for="">Author</label>
               <input type="text" name="" value="{{$inf->user->nama}}" class="form-control" readonly>
            </div>
            <div class="form-group">
               <label for="">Judul</label>
               <input type="text" value="{{$inf['judul']}}" class="form-control">
            </div>
            <div class="form-group">
               <label for="">Informasi</label>
               <textarea name="info" class="form-control" cols="30" rows="10">{{$inf['info']}}</textarea>
            </div>
            <button class="btn btn-grad"><i class="fa fa-edit"></i> Update</button>
         </form>
      </div>
    </div>
@endsection