@extends('masterLay')

@section('title')
    Bayar SPP
@endsection

@section('content')
 <!-- OVERVIEW -->
 <div class="panel panel-headline">
   <div class="panel-heading">
      <h3 class="panel-title">Panel Data</h3>
      <p class="panel-subtitle">{{date('d-F-Y')}}</p>
   </div>
   <div class="panel-body">
      <div class="row">
         <div class="col-md-12">
            <div class="metric">
               <span class="icon"><i class="fa fa-users"></i></span>
               <p>
                  <span class="number">{{Auth::user()->nama}}</span>
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END OVERVIEW -->
    <div class="panel panel-default">
       <div class="panel-heading btn-grad" style="color:white">
          <i class="fa fa-edit"></i> SPP
       </div>
       <div class="panel-body">
          <table class="table table-hover">
             <thead>
                <tr>
                   <th>Nama</th>
                   <th>Bulan</th>
                   <th>Keterangan</th>
                   <th>Pesan</th>
                </tr>
             </thead>
           <tbody>
              <tr>
                 <td>{{$murid['nama']}}</td>
                 <td>Januari</td>
                 @foreach (json_decode($murid['januari'],true) as $januari)
                     <td>{{$januari}}</td>
                 @endforeach
              </tr>
              <tr>
               <td></td>
                <td>Februari</td>
                  @foreach (json_decode($murid['februari'],true) as $februari)
                  <td>{{$februari}}</td>
                  @endforeach
             </tr> 
              <tr>
                 <td></td>
                  <td>Maret</td>
                  @foreach (json_decode($murid['maret'],true) as $maret)
                     <td>{{$maret}}</td>
                 @endforeach
               </tr> 
               <tr>
                  <td></td>
                   <td>April</td>
                   @foreach (json_decode($murid['april'],true) as $april)
                     <td>{{$april}}</td>
                  @endforeach
                </tr> 
                <tr>
                  <td></td>
                   <td>Mei</td>
                   @foreach (json_decode($murid['mei'],true) as $mei)
                     <td>{{$mei}}</td>
                  @endforeach
                </tr> 
                <tr>
                  <td></td>
                   <td>Juni</td>
                   @foreach (json_decode($murid['juni'],true) as $juni)
                     <td>{{$juni}}</td>
                  @endforeach
                </tr> 
                <tr>
                  <td></td>
                   <td>Juli</td>
                   @foreach (json_decode($murid['juli'],true) as $juli)
                     <td>{{$juli}}</td>
                  @endforeach
                </tr> 
                <tr>
                  <td></td>
                   <td>Agustus</td>
                   @foreach (json_decode($murid['agustus'],true) as $agustus)
                     <td>{{$agustus}}</td>
                  @endforeach
                </tr> 
                <tr>
                  <td></td>
                   <td>September</td>
                   @foreach (json_decode($murid['september'],true) as $september)
                     <td>{{$september}}</td>
                  @endforeach
                </tr> 
                <tr>
                  <td></td>
                   <td>Oktober</td>
                   @foreach (json_decode($murid['oktober'],true) as $oktober)
                     <td>{{$oktober}}</td>
                  @endforeach
                </tr> 
                <tr>
                  <td></td>
                   <td>November</td>
                   @foreach (json_decode($murid['november'],true) as $november)
                     <td>{{$november}}</td>
                  @endforeach
                </tr> 
                <tr>
                  <td></td>
                   <td>Desember</td>
                   @foreach (json_decode($murid['desember'],true) as $desember)
                     <td>{{$desember}}</td>
                  @endforeach
                </tr> 
           </tbody>
          </table>
      </div>
   </div>
 
@endsection
                  
