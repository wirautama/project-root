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
                        <!-- /.login-logo -->

                        <form action="/ChangePassword/<?= user_id(); ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= user_id(); ?>">
                            <input type="hidden" name="passwordLama" value="<?= user()->password_hash; ?>">
                            <div class="form-group has-feedback">
                                <label for="password_lama">Password Lama</label>
                                <input type="password" class="form-control <?= ($validation->hasError('password_lama')) ? 'is-invalid' : ''; ?>" placeholder="Password Lama" name="password_lama">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('password_lama'); ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="password_baru">Password Baru</label>
                                <input type="password" class="form-control <?= ($validation->hasError('password_baru')) ? 'is-invalid' : ''; ?>" placeholder="Password Baru" name="password_baru" value="">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('password_baru'); ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="konfirm_password_baru">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control <?= ($validation->hasError('konfirm_password_baru')) ? 'is-invalid' : ''; ?>" placeholder="Konfirmasi Password Baru" name="konfirm_password_baru" value="">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('konfirm_password_baru'); ?>
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