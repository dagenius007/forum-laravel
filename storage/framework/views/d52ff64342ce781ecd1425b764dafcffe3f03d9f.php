<header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>School</b>Finder</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo e(asset('/img/users/'.Auth::user()->display_img)); ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
            </a>
           
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <li>
              <a href="<?php echo e(route('logout')); ?>"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo e(csrf_field()); ?>

              </form>
          </li>
          </li>
        </ul>
      </div>

    </nav>
  </header>