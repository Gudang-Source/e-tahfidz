@extends('masterLay')

@section('title')
   Kelas
@endsection

@section('content')

<!-- TABLE HOVER -->
<div class="panel">
   <div class="panel-heading">
      <h3 class="panel-title">Data Kelas</h3>
   </div>
   <div class="panel-body">
      <a href="" class="btn btn-grad" style="margin-bottom:2%;" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-plus-circle"></i> Tambah Kelas</a>
      <table class="table table-hover">
         <thead>
            <tr>
               <th>#</th>
               <th>Nama Kelas</th>
               <th>Pengajar</th>
               <th>Angkatan</th>
               <th colspan="3" style="text-align: center">Aksi</th>
            </tr>
         </thead>
         @foreach ($classes as $class)
            <tr>
               <td>{{$loop->iteration}}</td>
               <td>{{$class->nama_kelas}}</td>
               <td>{{$class->pengajar->nama}}</td>
               <td>{{$class->angkatan}}</td>
               <td style="text-align: center">
                  <form action="{{route('suAdmin.kelas.destroy',$class)}}" method="post">
                    @csrf
                     @method('delete')
                     <button onclick="return confirm('Jika Kelas Ini Dihapus Data Didalamnya Juga Akan Terhapus Dan Tidak Dapat Dikembalikan')" class="btn btn-grad"><i class="lnr lnr-trash"></i></button>
                  </form>
               </td>
               <td  style="text-align: center">
                  <a href="{{route('suAdmin.kelas.edit', $class)}}" class="btn btn-grad"><i class="fa fa-edit"></i></a>
               </td>
               <td  style="text-align: center">
                  <a href="{{route('suAdmin.tambah.murid', $class)}}" class="btn btn-grad"><i class="fa fa-user-plus"></i></a>
               </td>
            </tr>
         @endforeach
         {{ $classes->links() }}
   </div>
</div>
<!-- END TABLE HOVER -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header btn-grad">
         <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
            <form action="{{route('suAdmin.kelas.get')}}" method="post">
               @csrf
               <div class="form-group">
                  <label for="">Nama Kelas</label>
                  <input type="text" name="kelas" class="form-control" placeholder="Masukan Nama Pengajar">
               </div>
               <div class="form-group">
                  <label for="">Angkatan</label>
                  <input type="text" name="angkatan" value="{{date('Y')}}" readonly class="form-control">
               </div>
               <div class="form-group">
                  <select name="pengajar"  class="form-control">
                     <option value="" disabled selected>Pilih Pengajar</option>
                     @foreach ($teachs as $teach)
                         <option value="{{$teach['id']}}">{{$teach['nama']}}</option>
                     @endforeach
                  </select>
               </div>
               <button type="submit" class="btn btn-grad"><i class="fa fa-plus-circle"></i> Tambah</button>
            </form>
       </div>
     </div>
   </div>
 </div>


 @endsection