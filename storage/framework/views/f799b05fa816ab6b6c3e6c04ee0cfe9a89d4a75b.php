<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
            <img src="<?php echo e(asset('/img/users/'.Auth::user()->display_img)); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p><?php echo e(Auth::user()->name); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="/admin">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                </a> 
            </li>
            <li class="">
                <a href="/admin/categories">
                    <i class="fa fa-dashboard"></i><span>Categories</span>
                </a> 
            </li>
            <li>
              <a href="/admin/threads">
                <i class="fa fa-th"></i> <span>Threads</span>
              </a>
            </li>
            <li>
              <a href="/admin/users">
                <i class="fa fa-calendar"></i> <span>Users</span>
              </a>
            </li>
            <li>
                <a href="/admin/featuredtopics">
                  <i class="fa fa-calendar"></i> <span>Featured Topics</span>
                </a>
            </li>
            <li>
                <a href="/admin/adminusers">
                  <i class="fa fa-calendar"></i> <span>Admin</span>
                </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>