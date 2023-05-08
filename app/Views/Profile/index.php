<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>

        <!-- Main content -->

        <div class="row">
            <div class="col-md-5">
                <section class="content">
                    <!-- /.login-logo -->
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success</h4>
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('warning')) : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Warning</h4>
                            <?= session()->getFlashdata('warning'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Error</h4>
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <img class="image-circle img-responsive img-rounded" src="<?= base_url(); ?>/img/<?= user()->user_image; ?>" alt="User profile picture" width="90px">
                                </li>
                                <li class="list-group-item">
                                    <b>No. ID :</b> <a class="pull-right"><?= user()->id; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email :</b> <a class="pull-right"><?= user()->email; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Username :</b> <a class="pull-right"><?= user()->username; ?></a>
                                    <br>

                                </li>
                                <li class="list-group-item">

                                    <b>Nama Lengkap :</b> <a class="pull-right"><?= user()->fullname; ?></a>
                                </li>
                            </ul>

                            <a href="/Profile/edit/<?= user_id(); ?>" class="btn btn-warning">Edit Profile</a>
                            <!-- /.box -->
                        </div>

                </section>
            </div>
        </div>

        <!-- /.content -->
</div>
</section>


<?= $this->endSection(); ?>