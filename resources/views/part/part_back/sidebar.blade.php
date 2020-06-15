<div id="sidebar-nav" class="sidebar">
   <div class="sidebar-scroll">
      <nav>
         <ul class="nav">
            @auth
            @if (Auth::user()->role == "super_admin")
               <li><a href="{{route('suAdmin.index')}}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
               <li><a href="{{route('suAdmin.pending.get')}}" class=""><i class="lnr lnr-list"></i> <span>Pendaftar Pending</span></a></li>
               <li><a href="{{route('suAdmin.murid.get')}}" class=""><i class="lnr lnr-users"></i> <span>Murid</span></a></li>
               <li><a href="{{route('suAdmin.pengajar.get')}}" class=""><i class="lnr lnr-users"></i> <span>Pengajar</span></a></li>
               <li><a href="{{route('suAdmin.kelas.get')}}" class=""><i class="lnr lnr-enter"></i> <span>Kelas</span></a></li>
               <li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
            @endif
            @endauth
                
                
         </ul>
      </nav>
   </div>
</div>