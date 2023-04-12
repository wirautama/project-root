<?= $this->extend('Auth/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Project</b>ROOT</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= lang('Auth.forgotPassword') ?></p>
        <?= view('App\Views\Auth\_message_block') ?>
        <p><?= lang('Auth.enterEmailForInstructions') ?></p>
        <form action="<?= url_to('forgot') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group has-feedback">
                <label for="email"><?= lang('Auth.emailAddress') ?></label>
                <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.email') ?>" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><?= lang('Auth.sendInstructions') ?></button>

            <!-- /.col -->
            <div class="col-xs-4">


            </div>
            <!-- /.col -->

    </div>

    </form>
    <!-- /.social-auth-links -->

</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?= $this->endSection(); ?>