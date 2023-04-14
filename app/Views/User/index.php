<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Daftar User
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
                <div class="col-md-12">
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
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Fullname</th>
                                    <th>Profile</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <?php $no = 1; ?>
                            <?php foreach ($users as $user) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $user->email; ?></td>
                                        <td><?= $user->username; ?></td>
                                        <td><?= $user->fullname; ?></td>
                                        <td><?= $user->user_image; ?></td>
                                        <td><?= $user->active == 1 ? '<a class="badge badge-success">active</a>' : 'Nonactive' ?></td>


                                    </tr>
                                </tbody>
                            <?php endforeach ?>
                        </table>
                    </section>
                </div>
            </div>
        </div>
        <!-- /.content -->
</div>
</section>
<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>


<?= $this->endSection(); ?>