@component('mail::message')
# Introduction
Kamu Diterima
The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
hahaha
{{-- {{ config('app.name') }} --}}
@endcomponent
