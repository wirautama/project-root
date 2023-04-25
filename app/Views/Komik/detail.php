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

                            <a href="/Komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>

                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Hapus</button>

                            <br>
                            <br>
                            <a href="/komik" class="btn-kembali">Kembali ke daftar komik</a>
                        </div>

                </div>

            </div>

        </div>
    </section>
</div>

<div class="modal modal-danger fade" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Komik <?= $komik['judul']; ?></h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus <?= $komik['judul']; ?> ??</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Mungkin nanti saja</button>
                <form action="/Komik/delete/<?= $komik['id']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-outline">Iya</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?= $this->endSection(); ?>