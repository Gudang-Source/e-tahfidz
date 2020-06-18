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
                     <span class="number">{{count($pengajar)}}</span>
                     <span class="title">Pembimbing</span>
                  </p>
               </div>
            </div>
            <div class="col-md-4">
               <div class="metric">
                  <span class="icon"><i class="fa fa-users"></i></span>
                  <p>
                     <span class="number">{{count($murid)}}</span>
                     <span class="title">Murid</span>
                  </p>
               </div>
            </div>
            <div class="col-md-4">
               <div class="metric">
                  <span class="icon"><i class="fa fa-university"></i></span>
                  <p>
                     <span class="number">{{count($class)}}</span>
                     <span class="title">Kelas</span>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- END OVERVIEW -->   
   <hr>
   <!-- PANEL HEADLINE -->
   <a href="" class="btn btn-grad" style="margin-bottom:2%;" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-bell"></i> Tambah Pengumuman</a>
    <!-- PANEL HEADLINE -->
    <div class="row">
      @foreach ($info as $inf)
         <div class="panel panel-headline">
            <div class="panel-heading">
               <h3 class="panel-title">{{$inf['judul']}}</h3>
               <p class="panel-subtitle">Informasi Oleh : {{$inf->user->nama}}</p>
               <small>Ditujukan : {{$inf->visible->visible}}</small> <br>
               <small>Published : {{$inf['created_at']->diffForHumans()}}</small> -
               <small>Updated : {{$inf['updated_at']->diffForHumans()}}</small>
               
            </div>
            <div class="panel-body" style="margin-top: -1%;" >
               <p>{{$inf['info']}}</p>
            </div>
            <div class="panel-footer">
               <tr>
                  <td><a href="{{route('suAdmin.info.edit',$inf)}}" class="btn btn-grad"><i class="fa fa-edit"></i></a></td>
                  <td>
                     <form action="{{route('suAdmin.info.destroy',$inf)}}" style="display: inline" method="post">
                        @method('delete')
                        @csrf
                        <button onclick="return confirm('Yakin Akan Menghapus Pengumuman Ini')" class="btn btn-grad"><i class="fa fa-trash"></i></button>
                     </form>
                  </td>
               </tr>
            </div>
         </div>
       @endforeach    
    </div>
  <!-- END PANEL HEADLINE -->

   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header btn-grad">
         <h5 class="modal-title" id="exampleModalLabel">Pengumuman</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="{{route('suAdmin.info.store')}}" method="post">
            @csrf
            <div class="form-group">
               <label for="">Judul</label>
               <input type="text" name="judul" class="form-control">
            </div>
            <div class="form-group">
               <label for="">Pengumuman</label>
               <textarea name="info" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
               <label for="">Ditujukan Untuk</label>
               <select name="tujuan" class="form-control">
                  @foreach ($visibles as $visible)
                      <option value="{{$visible['id']}}">{{$visible['visible']}}</option>
                  @endforeach
               </select>
            </div>
            <button class="btn btn-grad"><i class="fa fa-bell"></i> Umumkan</button>
         </form>
       </div>
     </div>
   </div>
 </div>
@endsection