<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Profile
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

                        <form action="/Profile/update/<?= user_id(); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= user_id(); ?>">
                            <input type="hidden" name="pictureLama" value="<?= user()->user_image; ?>">
                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="" id="email" name="email" value="<?= (old('email')) ? old('email') : user()->email; ?>">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('email'); ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" placeholder="" name="username" value="<?= (old('username')) ? old('username') : user()->username; ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('username'); ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" placeholder="" name="fullname" id="fullname" value="<?= (old('fullname')) ? old('fullname') : user()->fullname; ?>">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('fullname'); ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="user_image" class="custom_file_picture"><?= user()->user_image; ?></label>
                                <br>
                                <div class="col-sm-4">
                                    <img src="<?= base_url(); ?>/img/<?= user()->user_image; ?>" class="img-thumbnail img-preview" width="100px">
                                </div>
                                <input type="file" id="user_image" class="form-control <?= ($validation->hasError('user_image')) ? 'is-invalid' : ''; ?>" placeholder="" name="user_image" value="<?= (old('user_image')) ? old('user_image') : user()->user_image; ?>" onchange="previewImage()">

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
        <!-- <script>
            function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script> -->
        <script>
            function previewImage() {
                const picture = document.querySelector('#user_image');
                const pictureLabel = document.querySelector('.custom_file_picture');
                const imgPreview = document.querySelector('.img-preview');

                pictureLabel.textContent = picture.files[0].name;

                const filePicture = new FileReader();
                filePicture.readAsDataURL(picture.files[0]);

                filePicture.onload = function(e) {
                    imgPreview.src = e.target.result;
                }
            }
        </script>
</div>
</section>


<!-- /.content-wrapper -->
<?= $this->endSection(); ?>