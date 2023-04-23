<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url(); ?>/img/<?= user()->user_image; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= user()->username; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?= uri_string() == '' ? 'active' : '' ?>">
                <a href="<?= base_url('/'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview 
            
            
            <?= uri_string() == 'Group' ? 'active' : '' ?> 
            <?= uri_string() == 'Group/new' ? 'active' : '' ?> 
            
            <?= uri_string() == 'User' ? 'active' : '' ?>
                <?= uri_string() == 'Permissions' ? 'active' : '' ?>">

                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= uri_string() == 'Group' ? 'active' : '' ?>"><a href="<?= base_url('/Group'); ?>"><i class="fa fa-circle-o"></i>List Permission</a></li>
                    <li class="<?= uri_string() == 'User' ? 'active' : '' ?>"><a href="<?= base_url('/User'); ?>"><i class="fa fa-circle-o"></i> List Users</a></li>
                    <li class="<?= uri_string() == 'Permissions' ? 'active' : '' ?>"><a href="<?= base_url('/Permissions'); ?>"><i class="fa fa-circle-o"></i> List Group</a></li>
                </ul>
            </li>
            <!-- -->
            <li class="<?= uri_string() == 'Komik' ? 'active' : '' ?>">
                <a href="<?= base_url('/Komik'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Komik</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>