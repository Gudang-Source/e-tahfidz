@extends('masterLay')

@section('title')
   Pengajar
@endsection

@section('content')

<!-- TABLE HOVER -->
<div class="panel">
   <div class="panel-heading">
      <h3 class="panel-title">Data Pengajar</h3>
   </div>
   <div class="panel-body">
      <div class="row">
         <div class="col-md-4">
            <form action="{{route('pengajar.search')}}" method="get">
              @include('suAdmin.search.search')
            </form>
         </div>
         <div class="col-md-8">
            <a href="#" class="btn btn-grad" style="margin-bottom:2%;" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-user-plus"></i> Tambah Pengajar</a>
         </div>
      </div>
      <div class="table-responsive">
         <table class="table table-hover">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Nama Pengajar</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>No.Telepon</th>
                  <th colspan="4" style="text-align: center">Aksi</th>
               </tr>
            </thead>
          @foreach ($pengajar as $pjr)
              <tr>
                 <td>{{$loop->iteration}}</td>
                 <td>{{$pjr['nama']}}</td>
                 <td>{{$pjr['email']}}</td>
                 @if ($pjr['alamat'] == null)
                     <td>Belum Diisi</td>
                  @else 
                  <td>{{$pjr['alamat']}}</td>   
                 @endif
                 @if ($pjr['no_telp'] == null)
                    <td> Belum Diisi </td>
                  @else
                  <td>{{$pjr['no_telp']}}</td>
                 @endif
                 <td style="text-align: center"><a href="{{route('suAdmin.pengajar.note',$pjr)}}" class="btn btn-grad"><i class="fa fa-sticky-note"></i></a></td>
                 <td style="text-align: center"><a href="{{route('suAdmin.pengajar.edit', $pjr)}}" class="btn btn-grad"><i class="fa fa-edit"></i></a></td>
                  <td style="text-align: center">
                     <form action="{{route('suAdmin.pengajar.destroy',$pjr)}}" method="post">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Yakin Akan Menghapus Data Pengajar Ini ?? ')" type="submit" class="btn btn-grad"><i class="fa fa-trash"></i></button>
                     </form>
                  </td>
                  <td>
                     <a href="{{route('suAdmin.pengajar.detail', $pjr)}}" class="btn btn-grad"><i class="fa fa-search-plus"></i></a>
                  </td>
               </tr>
          @endforeach
         </table>
      </div>
      {{$pengajar->links()}}
   </div>
</div>
<!-- END TABLE HOVER -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header btn-grad">
         <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-plus"></i> Tambah Pengajar</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
            <form action="{{route('suAdmin.pengajar.get')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <label for="">Nama Pengajar</label>
                  <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Pengajar">
               </div>
               <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Masukan Email Aktif Pengajar">
               </div>
               <div class="form-group">
                  <label for="">No.Telepon</label>
                  <input type="text" name="no_telp" placeholder="Masukan No.Telepon Pengajar" class="form-control">
               </div>
               <div class="form-group">
                  <label for="">Alamat</label>
                  <input type="text" name="alamat" placeholder="Masukan Alamat Pengajar" class="form-control">
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <label for="">Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Masukan Password Pengajar">
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn btn-grad"><i class="fa fa-plus-circle"></i> Tambah</button>
            </form>
       </div>
     </div>
   </div>
 </div>
@endsection