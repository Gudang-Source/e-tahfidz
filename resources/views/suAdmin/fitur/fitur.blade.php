@extends('masterLay')

@section('title')
    Aktivasi Fitur
@endsection

@section('content')
    <div class="panel">
       <div class="panel-heading">
         <h3 class="panel-title">
          <i class="fa fa-edit"></i> Aktivasi Fitur
         </h3>
      </div>
       <div class="panel-body">
          <form action="{{route('suAdmin.fitur')}}" method="post">
            @csrf
             <label for="">Iklan</label>
             <div class="row">
                <div class="col-md-3">
                   <label class="fancy-radio">
                      <input name="iklan" value="checked" {{$stat[0]['status']}} type="radio">
                      <span><i></i>Aktiv</span>
                   </label>
                  </div>
                  <div class="col-md-3">
                     <label class="fancy-radio">
                        @if ($stat[0]['status'] == 'non-checked' || $stat[0]['status'] == null)                   
                        <input name="iklan" value="non-checked" checked type="radio">
                        @else
                        <input name="iklan" value="non-checked"  type="radio">
                        @endif
                        <span><i></i>Non-Aktiv</span>
                  </label>
               </div>
            </div>
            <br>
            <label for="">Infak / SPP</label>
            <div class="row">
               <div class="col-md-3">
                  <label class="fancy-radio">
                     <input name="spp" value="checked" {{$stat[1]['status']}} type="radio">
                     <span><i></i>Aktiv</span>
                  </label>
                 </div>
                 <div class="col-md-3">
                    <label class="fancy-radio">
                       @if ($stat[1]['status'] == 'non-checked' || $stat[1]['status'] == null)
                       <input name="spp" value="non-checked" checked type="radio">
                       @else
                       <input name="spp" value="non-checked" type="radio">
                       @endif
                       <span><i></i>Non-Aktiv</span>
                 </label>
              </div>
           </div>
           <div class="row" style="margin-top: 2%;">
            <button type="submit" class="btn btn-grad"><i class="fa fa-send"></i> Kirim</button>
           </div>
         </form>
      </div>
   </div>
@endsection
                  
