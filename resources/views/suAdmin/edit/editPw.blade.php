@method('put')
@csrf
<div class="form-group">
   <label for="">Password Baru</label>
   <input type="password" name="password" class="form-control" placeholder="Masukan Password Baru">
</div>
<div class="form-group">
   <label for="">Konfirmasi Password Baru</label>
   <input type="password" name="password_confirmation"  class="form-control" placeholder="Konfirmasi Password Baru">
</div>
<button type="submit" class="btn btn-grad"><i class="fa fa-edit"></i> Ganti Password</button>