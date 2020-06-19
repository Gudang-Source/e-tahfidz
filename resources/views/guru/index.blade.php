@extends('masterLay')

@section('title')
   Dashboard
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
            <div class="col-md-4">
               <div class="metric">
                  <span class="icon"><i class="fa fa-users"></i></span>
                  <p>
                     <span class="number">{{Auth::user()->nama}}</span>
                     <span class="title">Nama</span>
                  </p>
               </div>
            </div>
            <div class="col-md-4">
               <div class="metric">
                  <span class="icon"><i class="fa fa-university"></i></span>
                  <p>
                     <span class="number">{{$data['class']['nama_kelas']}}</span>
                     <span class="title">Kelas</span>
                  </p>
               </div>
            </div>
            <div class="col-md-4">
               <div class="metric">
                  <span class="icon"><i class="fa fa-users"></i></span>
                  <p>
                     <span class="number">{{count($data['murid'])}}</span>
                     <span class="title">Jumlah Murid</span>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- END OVERVIEW -->   
    <hr>
   <!-- PANEL HEADLINE -->
  <div class="panel panel-default">
   <div class="panel-heading btn-grad" style="color:white">
      <i class="fa fa-info"></i> Ruang Informasi
      <div class="right">
         <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
         <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
      </div>
   </div>
   <hr class="batas">
   <div class="panel-body">
        <!-- PANEL HEADLINE -->
    <div class="row">
      <div class="col-md-6">
         <div class="panel panel-default">
            <div class="panel-heading btn-grad" style="color:white" >
               <i class="fa fa-info"></i> Informasi Khusus Guru
            </div>
            <hr>
            @foreach ($data['infoA'] as $inf)
               <!-- PANEL WITH FOOTER -->
							<div class="panel panel-teach">
								<div class="panel-heading">
                           <h3 class="panel-title">{{$inf['judul']}}</h3>
                           <div class="right">
                              <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                              <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                           </div>
								</div>
								<div class="panel-body panel-body-teach">
									{{$inf['info']}}
								</div>
								<div class="panel-footer btn-grad">
									<h5><i class="fa fa-calendar"></i> Published : {{$inf['created_at']->format('d-F-Y')}} - Updated : {{$inf['updated_at']->format('d-F-Y')}}</h5>
								</div>
							</div>
							<!-- END PANEL WITH FOOTER -->
            <hr>
            @endforeach    
         </div>
      </div>
      <div class="col-md-6">
         <div class="panel panel-default">
            <div class="panel-heading btn-grad" style="color:white" >
               <i class="fa fa-info"></i> Informasi Guru Dan Murid
            </div>
            <hr>
            @foreach ($data['infoB'] as $inf)
               <!-- PANEL WITH FOOTER -->
							<div class="panel panel-teach">
								<div class="panel-heading">
                           <h3 class="panel-title">{{$inf['judul']}}</h3>
                           <div class="right">
                              <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                              <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                           </div>
								</div>
								<div class="panel-body panel-body-teach">
									{{$inf['info']}}
								</div>
								<div class="panel-footer btn-grad">
									<h5><i class="fa fa-calendar"></i> Published : {{$inf['created_at']->format('d-F-Y')}} - Updated : {{$inf['updated_at']->format('d-F-Y')}}</h5>
								</div>
							</div>
							<!-- END PANEL WITH FOOTER -->
            <hr>
            @endforeach    
         </div>
      </div>
   </div>
  <!-- END PANEL HEADLINE -->
   </div>
  </div>
@endsection