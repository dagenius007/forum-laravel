<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(asset('img/sckoolhouse.svg')); ?>" alt="<?php echo e(config('app.name', 'Forum')); ?>">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->


            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li><a class="navbar__active" href="<?php echo e(route('home')); ?>">Home</a></li>
                <?php if(Auth::guest()): ?>

                <li><a href="<?php echo e(route('login')); ?>">Categories</a></li>
                <li class="<?php echo e(Request::url() == url('/login') ? 'navbar__active' : ''); ?>"><a href="<?php echo e(route('login')); ?>">Login</a></li>
                <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(route('profile', Auth::user()->slug)); ?>">My Profile</a></li>
                <li>
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </li>
                <?php endif; ?>
                <li class="search">
                    <a href="#">
                        <form action="/search" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="search__input">
                                <input type="text" name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </a>
                </li>
                

            </ul>
        </div>
    </div>
</nav>