@extends('masterLay')

@section('title')
   Kelas Saya
@endsection

@section('content')
{{-- {{$classes[0]}} --}}
@if ($classes[0] !== [])
@foreach ($classes as $class)
    <div class="panel panel-default">
       <div class="panel-heading btn-grad" style="color:white;">
          {{$class[0]['nama_kelas']}}  
       </div>
       <div class="panel-body">
          <span class="btn btn-grad"><a href="{{route('murid.class.detail',$class)}}" style="text-decoration: none;color:white;"><i class="lnr lnr-enter"></i> Masuk Kelas</a></span>
       </div>
    </div>
@endforeach
@else
<div class="panel panel-default">
   <div class="panel-heading btn-grad" style="color:white">Kamu Belum Masuk Kelas Manapun</div>
</div>
@endif

@endsection
            
      