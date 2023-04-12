<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>RT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Project</b>ROOT</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


                    <!-- User Account: style can be found in dropdown.less -->
                    <!-- <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            
                            <span class="hidden-xs"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="" data-toggle="modal" data-target="#logout-modal" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li> -->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= user()->fullname; ?> <span class="caret"></span></a>
                        <!-- <img src="<?= base_url(); ?>/img/<?= user()->user_image; ?>" class="user-image" alt="User Image" width="70px"> -->
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= base_url('Profile') ?>"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="<?= base_url('ChangePassword'); ?>"><i class="fa fa-lock"></i> Change Password</a></li>
                            <li><a href="" data-toggle="modal" data-target="#logout-modal"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>


    <!-- <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url(); ?>/template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <i class="fa fa-user"></i>
            <span class="hidden-xs"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="<?= base_url('Profile'); ?>"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="" data-toggle="modal" data-target="#logout-modal"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
        </ul>
    </li> -->