 <!-- Page Wrapper -->
 <div id="wrapper">

     <!-- Sidebar -->
     <ul class="navbar-nav bg-info text-white sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
             <div class="sidebar-brand-icon rotate-n-15">
                 {{-- <i class="fas fa-laugh-wink"></i> --}}
             </div>
             <div class="sidebar-brand-text mx-3">Dioli</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item active">
             <a class="nav-link" href="">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
             Navigasi Bar
         </div>

         <!-- Nav Item - User -->
         <li class="nav-item">
             <a class="nav-link" href="{{ route('admin.user.index') }}">
                 <i class="fas fa-fw fa-table"></i>
                 <span>Users</span></a>
         </li>

         <!-- Nav Item - Chef -->
         <li class="nav-item">
             <a class="nav-link" href="{{ route('admin.koki.index') }}">
                 <i class="fas fa-fw fa-chart-area"></i>
                 <span>Chef</span></a>
         </li>

         <!-- Nav Item - Menu -->
         <li class="nav-item">
             <a class="nav-link" href="{{ route('admin.menu.index') }}">
                 <i class="fas fa-fw fa-chart-area"></i>
                 <span>Menu</span></a>
         </li>

         <!-- Nav Item - Blog -->
         <li class="nav-item">
             <a class="nav-link" href="{{ route('admin.blog.index') }}">
                 <i class="fas fa-fw fa-chart-area"></i>
                 <span>Blog</span></a>
         </li>

         <!-- Nav Item - Pesan -->
         <li class="nav-item">
             <a class="nav-link" href="{{ route('pesan.index') }}">
                 <i class="fas fa-fw fa-chart-area"></i>
                 <span>Pesan</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         {{-- <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div> --}}

     </ul>

     <!-- End of Sidebar -->

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

             <!-- Topbar -->
             <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                 <!-- Sidebar Toggle (Topbar) -->
                 <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                     <i class="fa fa-bars"></i>
                 </button>

                 <!-- Topbar Search -->
                 <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                     <div class="input-group">
                         <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                             aria-label="Search" aria-describedby="basic-addon2">
                         <div class="input-group-append">
                             <button class="btn btn-primary" type="button">
                                 <i class="fas fa-search fa-sm"></i>
                             </button>
                         </div>
                     </div>
                 </form>

                 <!-- Topbar Navbar -->
                 <ul class="navbar-nav ml-auto">
                     <li class="nav-item dropdown no-arrow">
                         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             @if (Auth::check())
                                 <span
                                     class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                             @endif
                             <!-- Uncomment the following line if you want to display profile image -->
                             <!-- <img class="img-profile rounded-circle" src="{{ asset('sb-admin') }}/img/undraw_profile.svg"> -->
                         </a>
                         <!-- Dropdown - User Information -->
                         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                             <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                 <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Profile
                             </a>
                             <a class="dropdown-item" href="">
                                 <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Settings
                             </a>
                             <a class="dropdown-item" href="#">
                                 <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Activity Log
                             </a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="#"
                                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Logout
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                 style="display: none;">
                                 @csrf
                             </form>


                         </div>
                     </li>
                 </ul>

             </nav>
             <!-- End of Topbar -->

             {{-- untuk konten --}}
             @yield('content')

         </div>

         <!-- End of Main Content -->

         <!-- Footer -->
         <footer class="sticky-footer bg-white">
             <div class="container my-auto">
                 <div class="copyright text-center my-auto">
                     <span>Copyright &copy; Ariz | L'ars Tech</span>
                 </div>
             </div>
         </footer>
         <!-- End of Footer -->

     </div>
     <!-- End of Content Wrapper -->
 </div>

 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>
