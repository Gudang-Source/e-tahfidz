@method('put')
@csrf
<div class="form-group">
   <label for="">Password Baru</label>
   <input type="password" name="password" class="form-control" placeholder="Masukan Password Baru">
   {!!$errors->first('password','<span class="text-danger">:message</span>')!!}
</div>
<div class="form-group">
   <label for="">Konfirmasi Password Baru</label>
   <input type="password" name="password_confirmation" class="form-control is-invalid" placeholder="Konfirmasi Password Baru">
   {!!$errors->first('password_confirmation','<span class="text-danger">:message</span>')!!}
</div>
<button type="submit" class="btn btn-grad"><i class="fa fa-edit"></i> Ganti Password</button>