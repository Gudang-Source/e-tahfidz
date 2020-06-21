@component('mail::message')
# Tahfidz Online
{{session('nama')}} Akun Kamu Sudah Aktif Dan Sudah Bisa Digunakan

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Klik Disini Untuk Login
@endcomponent

Hormat Kami<br>
{{-- {{ config('app.name') }} --}}
@endcomponent
