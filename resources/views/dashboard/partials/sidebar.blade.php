<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fab fa-connectdevelop"></i>
      </div>
      <div class="sidebar-brand-text mx-3">DSS <sup>SAW</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{\Route::current()->getName()=='home' ? 'active' : ''}}">
      <a class="nav-link" href="{{route('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{\Route::current()->getName()=='criteria' ? 'active' : ''}}">
    <a class="nav-link " href="{{route('criteria')}}">
        <i class="fas fa-fw fa-list"></i>
        <span>Criteria</span></a>
    </li>
    

    <li class="nav-item {{\Route::current()->getName()=='employe' ? 'active' : ''}}">
      <a class="nav-link" href="{{route('employe')}}">
        <i class="fas fa-fw fa-users"></i>
        <span>Employe</span></a>
    </li>
    

    <li class="nav-item {{\Route::current()->getName()=='assessment' ? 'active' : ''}}">
      <a class="nav-link" href="{{route('assessment')}}">
        <i class="fas fa-fw fa-star-half-alt"></i>
        <span>Assessment</span></a>
    </li>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-fw  fa-sign-out-alt"></i>
        <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block"> 

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>