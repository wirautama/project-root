<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tambah Data Komik
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <form action="/Komik/save" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3 ">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : ''; ?>" id="judul" autofocus value="<?= old('judul'); ?>" placeholder="Judul Komik">
                            <div class="invalid-feedback">
                                <?= validation_show_error('judul'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control <?= (validation_show_error('penulis')) ? 'is-invalid' : ''; ?>" id="penulis" value="<?= old('penulis'); ?>" placeholder="Penulis Komik">
                            <div class="invalid-feedback">
                                <?= validation_show_error('penulis'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control <?= (validation_show_error('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" value="<?= old('penerbit'); ?>" placeholder="Penerbit Komik">
                            <div class="invalid-feedback">
                                <?= validation_show_error('penerbit'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="rilis" class="form-label">Tanggal Rilis</label>
                            <input type="date" name="rilis" class="form-control <?= (validation_show_error('rilis')) ? 'is-invalid' : ''; ?>" id="rilis" value="<?= old('rilis'); ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('rilis'); ?>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="sampul" class="custom_file_sampul">Sampul</label>

                            <img src="/img/default.png" class="img-thumbnail img-preview inline-block" width="100px">

                            <input class="form-control <?= (validation_show_error('sampul')) ? 'is-invalid' : ''; ?>" type="file" id="sampul" name="sampul" onchange="previewImage()">
                            <div class="invalid-feedback">
                                <?= validation_show_error('sampul'); ?>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="number" name="harga" class="form-control <?= (validation_show_error('harga')) ? 'is-invalid' : ''; ?>" id="harga" value="<?= old('harga'); ?>" placeholder="example : 130000">
                            </div>
                            <div class="invalid-feedback">
                                <?= validation_show_error('harga'); ?>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>
<script>
    function previewImage() {
        const picture = document.querySelector('#sampul');
        const pictureLabel = document.querySelector('.custom_file_sampul');
        const imgPreview = document.querySelector('.img-preview');

        pictureLabel.textContent = picture.files[0].name;

        const filePicture = new FileReader();
        filePicture.readAsDataURL(picture.files[0]);

        filePicture.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>


<?= $this->endSection(); ?>