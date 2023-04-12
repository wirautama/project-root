<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Change Password
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>

        <!-- Main content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <section class="content">
                        <!-- /.login-logo -->

                        <form action="<?= base_url('Profile') ?>/<?= user_id(); ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group has-feedback">
                                <label for="password_lama">Password Lama</label>
                                <input type="password" class="form-control" placeholder="Password Lama" name="password_lama">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="password_baru">Password Baru</label>
                                <input type="password" class="form-control" placeholder="Password Baru" name="password_baru" value="">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="konf_password">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" placeholder="Konfirmasi Password Baru" name="konf_password" value="">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>

                        </form>
                    </section>
                </div>
            </div>
        </div>
        <!-- /.content -->
</div>
</section>


<!-- /.content-wrapper -->
<?= $this->endSection(); ?>