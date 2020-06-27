@extends('masterLay')

@section('title')
   Kelas
@endsection

@section('content')

<!-- TABLE HOVER -->

<div class="row">
  <!-- OVERVIEW -->
  <div class="panel panel-headline">
   <div class="panel-heading">
      <h3 class="panel-title">Detail Kelas </h3>
      <p class="panel-subtitle">{{date('d-F-Y')}}</p>
   </div>
   <div class="panel-body">
      <div class="row">
         <div class="col-md-4">
            <div class="metric">
               <span class="icon"><i class="fa fa-user"></i></span>
               <p>
               <span class="number">Pembimbing</span>
                  <span class="title">{{$class->pengajar->nama}}</span>
               </p>
            </div>
         </div>
         <div class="col-md-4">
            <div class="metric">
               <span class="icon"><i class="fa fa-university"></i></span>
               <p>
                  <span class="number">Nama Kelas</span>
                  <span class="title">{{$class['nama_kelas']}}</span>
               </p>
            </div>
         </div>
         <div class="col-md-4">
            <div class="metric">
               <span class="icon"><i class="fa fa-users"></i></span>
               <p>
                  <span class="number">Jumlah Murid</span>
                  <span class="title">{{count($murids)}}</span>
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END OVERVIEW -->   
</div>

<div class="row">
   <div class="panel">
      <div class="row">
         <div class="col-md-12 ">
             <div class="panel-heading">
                <h3 class="panel-title">Tambah Murid Kelas</h3>
             </div>
             <div class="panel-body">
                <form action="{{route('suAdmin.tambah.murid',$class)}}" method="post">
                  @csrf
                   <div class="form-group">
                      <select style="width: 100%;" class="js-example-basic-multiple form-control" name="murid[]" multiple="multiple">
                         @foreach ($students as $student)
                             <option value="{{$student['id']}}">{{$student['nama']}}</option>
                         @endforeach
                       </select>
                       {!! $errors->first('murid', '<span class="text-danger">:message</span>') !!}
                     </div>
                   <button class="btn btn-grad"><i class="fa fa-user-plus"></i> Tambah Murid</button>
                </form>
             </div>
         </div>
         <div class="col-md-12">
          <div class="panel-heading">
             <h3 class="panel-title">Data Murid Kelas</h3>
          </div>
          <div class="panel-body">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Nama Murid</th>
                     <th colspan="2" style="text-align: center">Aksi</th>
                  </tr>
               </thead>
               @foreach ($murids as $murid)
                  <tr>
                     <td>{{$loop->iteration}}</td>
                     <td>{{$murid->nama}}</td>
                    <td style="text-align: center">
                       <a href="{{route('suAdmin.siswa.note',$murid,$class)}}" class="btn btn-grad"><i class="fa fa-sticky-note"></i></a>
                    </td>
                     <td style="text-align: center">
                        <form action="{{route('suAdmin.kelas.drop', $murid)}}" method="post">
                           @csrf
                           @method('delete')
                           <button class="btn btn-grad" onclick="return confirm('Yakin Akan Mengeluarkan Murid ?')" ><i class="fa fa-trash"></i></button>
                        </form>
                     </td>
                  </tr>
               @endforeach
               {{-- {{ $murids->links() }} --}}
         </div>
         </div>
      </div>
    </div>
</div>

<!-- END TABLE HOVER -->
@endsection