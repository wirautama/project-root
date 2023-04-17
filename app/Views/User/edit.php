<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit User
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>

        <!-- Main content -->
        <div class="container">
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
                        <form action="/User/update/<?= $users->id; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $users->id; ?>">
                            <input type="hidden" name="pictureLama" value="<?= $users->user_image; ?>">
                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="" id="email" name="email" value="<?= (old('email')) ? old('email') : $users->email; ?>">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('email'); ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" placeholder="" name="username" value="<?= (old('username')) ? old('username') : $users->username; ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('username'); ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" placeholder="" name="fullname" id="fullname" value="<?= (old('fullname')) ? old('fullname') : $users->fullname; ?>">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('fullname'); ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="user_image" class="custom_file_picture"><?= user()->user_image; ?></label>
                                <br>
                                <div class="col-sm-4">
                                    <img src="<?= base_url(); ?>/img/<?= $users->user_image; ?>" class="img-thumbnail img-preview" width="100px">
                                </div>
                                <input type="file" id="user_image" class="form-control <?= ($validation->hasError('user_image')) ? 'is-invalid' : ''; ?>" placeholder="" name="user_image" value="<?= (old('user_image')) ? old('user_image') : $users->user_image; ?>" onchange="previewImage()">

                                <div class="invalid-feedback">
                                    <?= validation_show_error('user_image'); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>

                        </form>

                    </section>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </section> <!-- /.content -->

</div>
<?= $this->endSection(); ?>