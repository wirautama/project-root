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
            <li class="active">
                <a href="<?= base_url('/'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="<?= base_url('/User'); ?>">
                    <i class="fa fa-users"></i> <span>Daftar User</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>