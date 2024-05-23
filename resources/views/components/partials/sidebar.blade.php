   <!-- ======= Sidebar ======= -->
   <aside id="sidebar" class="sidebar">
       <ul class="sidebar-nav" id="sidebar-nav">
           <li class="nav-item">
               <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="{{ url('/') }}">
                   <i class="fa-solid fa-house"></i>
                   <span>Dashboard</span>
               </a>
           </li>

           <li class="nav-item">
               <a class="nav-link {{ request()->is('profile') ? '' : 'collapsed' }}" href="{{ url('profile') }}">
                   <i class="fa-solid fa-user-lock"></i>
                   <span>Authentication & Profile</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link {{ request()->is('adminPanel') ? '' : 'collapsed' }}" href="{{ url('/adminPanel') }}">
                   <i class="fa-regular fa-window-maximize"></i>
                   <span>Admin Panel</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link {{ request()->is('realtimeChat') ? '' : 'collapsed' }}" href="{{ url('/realtimeChat') }}">
                   <i class="fa-brands fa-rocketchat"></i>
                   <span>Realtime Chat</span>
               </a>
           </li>
       </ul>
   </aside><!-- End Sidebar-->
