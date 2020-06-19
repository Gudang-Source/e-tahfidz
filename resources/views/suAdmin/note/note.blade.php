@extends('masterLay');

@section('title')
    Catatan Untuk Murid
@endsection

@section('content')
    <div class="panel panel-default">
       <div class="panel-heading btn-grad" style="color:white">
          <i class="fa fa-edit"></i> Update Data Kelas
       </div>
      <div class="panel-body">
         <form action="{{route('suAdmin.siswa.note',$murid)}}" method="post">
            @csrf
            <div class="form-group">
               <label for="">Pengirim Catatan</label>
               <input type="text" name="pengirim" class="form-control" value="{{Auth::user()->nama}}" readonly >
            </div>
            <div class="form-group">
               <label for="">Penerima Catatan</label>
               <input type="text" name="penerima" class="form-control" value="{{$murid['nama']}}" readonly>
            </div>
            <div class="form-group">
               <label for="">Isi Catatan</label>
               <textarea name="catatan" class="form-control" cols="30" rows="10" class="form-control"></textarea>
               {!! $errors->first('catatan', '<span class="text-danger">:message</span>') !!}
            </div>
            <button class="btn btn-grad"><i class="fa fa-send-o"></i> Kirim</button>
         </form>
      </div>
    </div>
@endsection