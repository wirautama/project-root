<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Komik
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
                <div class="col-md-3">
                    <img src="<?= base_url(); ?>/img/<?= $komik['sampul']; ?>" width="250px" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-5">
                    <section class="content">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h1 class="card-title"><?= $komik['judul']; ?></h1>
                            <table>
                                <tr>
                                    <td>
                                        <h4><b>Penulis</b></h4>
                                    </td>
                                    <td>
                                        <h4 style="padding-left: 3px;">:</h4>
                                    </td>
                                    <td>
                                        <h4 style="padding-left: 5px;"><?= $komik['penulis']; ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4><b>Penerbit</b></h4>
                                    </td>
                                    <td>
                                        <h4 style="padding-left: 3px;">:</h4>
                                    </td>
                                    <td>
                                        <h4 style="padding-left: 5px;"><?= $komik['penerbit']; ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4><b>Tanggal Rilis</b></h4>
                                    </td>
                                    <td>
                                        <h4 style="padding-left: 3px;">:</h4>
                                    </td>
                                    <td>
                                        <h4 style="padding-left: 5px;"><?= date('d F Y', strtotime($komik['rilis'])); ?></h4>
                                    </td>
                                </tr>
                            </table>
                            <br>

                            <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>

                            <br>
                            <br>
                            <a href="/komik" class="btn-kembali">Kembali ke daftar komik</a>
                        </div>

                </div>

            </div>

        </div>
    </section>
</div>

<?= $this->endSection(); ?>