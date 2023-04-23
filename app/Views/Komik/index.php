<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Komik
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section class="content">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Sampul</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Tanggal Rilis</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($komik as $k) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><img src="/img/<?= $k['sampul']; ?>" alt="" class="sampul" width="70px"></td>
                                        <td><?= $k['judul']; ?></td>
                                        <td><?= date('d F Y', strtotime($k['rilis'])); ?></td>
                                        <td><?= number_to_currency($k['harga'], 'IDR', 'id_ID'); ?></td>
                                        <td>
                                            <a href="/komik/detail/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                </div>

            </div>

        </div>
    </section>
</div>

<?= $this->endSection(); ?>