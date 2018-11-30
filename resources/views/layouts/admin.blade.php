<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('include.headers')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>NY</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sun</b>way</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> 
                      notification come here.
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <a href="/profile/@yield('profile_link')/show"><img src="{{ asset('dist/img/blank-user.png') }}" class="img-circle" alt="User Image"></a>
        </div>
        <div class="pull-left info">
          <p>@yield('user_name')</p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="/home">
            <i class="fa fa-dashboard"></i> <span>Module</span>
          </a>
        </li>
        <li>
          <a href="/groups">
            <i class="fa fa-th"></i> <span>Groups</span>
          </a>
        </li>
        <li>
          <a href="/roles">
            <i class="fa fa-book"></i> <span>Role</span>
          </a>
        </li>
        <li class="header">MANAGEMENTS</li>
        <li>
          <a href="/projects">
            <i class="fa fa-book"></i> <span>Projects</span>
          </a>
        </li>
        <li class="header">LABELS</li>
        <li>
          <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <i class="fa fa-circle-o text-red"></i>
              <span>{{ __('Logout') }}</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>@yield('content_header')</small></h1>
    </section>

    @yield('content')
  </div>
</div>
<!-- ./wrapper -->

@include('include.scripts')

@yield('function')

</body>
</html>
