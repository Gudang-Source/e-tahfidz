@extends('masterLay')

@section('title')
    Fitul Iklan
@endsection

@section('content')
    <div class="panel panel-default">
       <div class="panel-heading btn-grad" style="color:white">
          <i class="fa fa-edit"></i> Aktivasi Fitur
       </div>
       <div class="panel-body">
         @if ($iklan[0]['status'] == 'non-checked' || $iklan[0]['status'] == null)
             <h5>Fitur Ini Belum Diaktifkan, Silahkan Aktifkan Di Menu AKtivasi Fitur</h5>
         @else
         <form action="{{route('suAdmin.fitur.iklan')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <label for="">Pilih Foto Untuk Iklan</label>
               <input type="file" name="gambar" class="form-control">
            </div>
            <button type="submit" class="btn btn-grad"><i class="fa fa-upload"></i> Upload</button>
         </form>
          @endif
      </div>
   </div>
   @if ($iklan[0]['status'] == 'non-checked' || $iklan[0]['status'] == null)
   <div class="panel-body">
      <div class="panel panel-defaul">
         <div class="panel-body">
            <h5>Fitur Ini Belum Diaktifkan Silahkan Aktifkan Dimenu Aktivasi</h5>
         </div>
      </div>
   </div>
   @else
   <div class="panel panel-default">
      <div class="panel-heading btn-grad" style="color:white">
         Pilih Foto Untuk Iklan
      </div>
      <div class="panel-body">
         @if ($gambar !== [])
         <form action="{{route('suAdmin.fitur.iklan.gambar')}}" method="post">
            @csrf
            <div class="row">
               @foreach ($gambar as $gb)
               <div class="col-md-4">
                  <img src="/images/{{$gb['gambar']}}" style="width: 50%;" class="img-fluid" alt="">
                  <div class="row" style="margin-top: 2%;">
                     <div class="col-md-4">
                        <label class="fancy-radio">
                           <input name="pilihan[]" {{$gb['status']}} value="{{$gb['id']}}" type="checkbox">
                           <span><i></i>Pilih</span>
                        </label>
                     </div>
                     <div class="col-md-4">
                        <label class="fancy-radio">
                           @if ($gb['status'] == 'non-checked')
                           <input name="tidak[]" checked value="{{$gb['id']}}" type="checkbox">
                           @else
                           <input name="tidak[]"  value="{{$gb['id']}}" type="checkbox">
                           @endif
                           <span><i></i>Tidak Pilih</span>
                        </label>
                     </div>
                     
                  </div>
               </div>
               @endforeach
            </div>
            <button type="submit" class="btn btn-grad"><i class="fa fa-send"></i> Kirim</button>
         </form>
         @else

         @endif
      </div>
   </div>
   @endif
 
@endsection
                  
