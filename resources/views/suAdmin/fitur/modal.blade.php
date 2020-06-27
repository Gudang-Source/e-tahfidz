<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header btn-grad">
         <h5 class="modal-title" id="exampleModalLabel">Bayar SPP</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="{{route('suAdmin.bayar.confir',$murid)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
               <label for="">Nama Murid</label>
               <input type="text" name="nama" readonly value="{{$murid['nama']}}" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Pesan Kepada User</label>
              <input type="text" name="pesan" placeholder="Masukan Pesan / Nominal Infak Kepada User"  class="form-control">
            </div>
            <div class="form-group">
               <label for="">Bulan</label>
               <select name="bulan" class="form-control">
                 <option value="januari">Januari</option>
                 <option value="februari">Februari</option>
                 <option value="maret">Maret</option>
                 <option value="april">April</option>
                 <option value="mei">Mei</option>
                 <option value="juni">Juni</option>
                 <option value="juli">Juli</option>
                 <option value="agustus">Agustus</option>
                 <option value="september">September</option>
                 <option value="oktober">Oktober</option>
                 <option value="november">November</option>
                 <option value="desember">Desember</option>

               </select>
            </div>
            <button class="btn btn-grad"><i class="fa fa-check-circle"></i> Bayar</button>
         </form>
       </div>
     </div>
   </div>
 </div>