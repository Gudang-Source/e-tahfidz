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
                  <span class="number">{{$murid['nama']}}</span>
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END OVERVIEW -->
<div class="row" style="margin-bottom: 2%;">
   <div class="col-md-4">
   <a href="#" class="btn btn-grad" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-list"></i> Bayar SPP</a>
   </div>
</div>
@include('suAdmin.fitur.modal')   
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
                </tr>
             </thead>
           <tbody>
              <tr>
                 <td>{{$murid['nama']}}</td>
                 <td>Januari</td>
                 <td>{{$murid['januari']}}</td>
              </tr>
              <tr>
               <td></td>
                <td>Februari</td>
                <td>{{$murid['februari']}}</td>
             </tr> 
              <tr>
                 <td></td>
                  <td>Maret</td>
                 <td>{{$murid['maret']}}</td>
               </tr> 
               <tr>
                  <td></td>
                   <td>April</td>
                 <td>{{$murid['april']}}</td>
                </tr> 
                <tr>
                  <td></td>
                   <td>Mei</td>
                 <td>{{$murid['mei']}}</td>
                </tr> 
                <tr>
                  <td></td>
                   <td>Juni</td>
                 <td>{{$murid['juni']}}</td>
                </tr> 
                <tr>
                  <td></td>
                   <td>Juli</td>
                 <td>{{$murid['juli']}}</td>
                </tr> 
                <tr>
                  <td></td>
                   <td>Agustus</td>
                 <td>{{$murid['agustus']}}</td>
                </tr> 
                <tr>
                  <td></td>
                   <td>September</td>
                 <td>{{$murid['september']}}</td>
                </tr> 
                <tr>
                  <td></td>
                   <td>Oktober</td>
                 <td>{{$murid['oktober']}}</td>
                </tr> 
                <tr>
                  <td></td>
                   <td>November</td>
                 <td>{{$murid['november']}}</td>
                </tr> 
                <tr>
                  <td></td>
                   <td>Desember</td>
                 <td>{{$murid['desember']}}</td>
                </tr> 
           </tbody>
          </table>
      </div>
   </div>
 
@endsection
                  
