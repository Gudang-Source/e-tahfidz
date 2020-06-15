@extends('masterLay');

@section('title')
    Edit Data Kelas
@endsection

@section('content')
    <div class="panel panel-default">
       <div class="panel-heading btn-grad" style="color:white">
          <i class="fa fa-edit"></i> Update Data Kelas
       </div>
      <div class="panel-body">
         <form action="{{route('suAdmin.kelas.edit', $class)}}" method="post">
            @csrf
            @method('put')
           <div class="form-group">
              <label for="">Nama Kelas</label>
              <input type="text" name="kelas" value="{{$class['nama_kelas']}}" class="form-control">
           </div>
           <div class="form-group">
              <label for="">Pengajar Sekarang</label>
              <input type="text" name="pengajar_lama" readonly class="form-control" value="{{$class->pengajar->nama}}">
           </div>
           <div class="form-group">
              <label for="">Pengajar Pengganti</label>
              <select class="form-control" name="pengajar_baru" >
                 <option value="" disabled selected> Pilih Pengajar Pengganti</option>
               @foreach ($teachs as $teach)
                  <option value="{{$teach['id']}}">{{$teach['nama']}}</option>
               @endforeach
              </select>
           </div>
           <button class="btn btn-grad" type="submit"><i class="fa fa-edit"></i> Update Data</button>
         </form>
      </div>
    </div>
@endsection