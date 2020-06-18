@extends('masterLay')

@section('title')
   Catatan
@endsection

@section('content')
  <!-- PANEL HEADLINE -->
   <div class="panel panel-default">
      <div class="panel-heading btn-grad" style="color:white">
         <i class="fa fa-sticky-note-o"></i> Catatan Perbaikan
      </div>
      <hr>
      <div class="panel-body">
         <div class="row">
            @foreach ($notes as $note)
               <div class="panel panel-default">
                  <div class="panel-heading btn-grad" style="color:white">
                     <i class="fa fa-sticky-note"></i> Catatan Tanggal : {{$note['created_at']->format('d-F-Y')}}
                  </div>
                  <div class="panel-body">
                     {{$note['note']}}
                  </div>
                  <div class="panel-footer">
                     Published : {{$note['created_at']->diffForHumans()}}
                  </div>
               </div>
         @endforeach
         {{ $notes->links() }}
         </div>
      </div>

   </div>
  <!-- END PANEL HEADLINE -->
@endsection