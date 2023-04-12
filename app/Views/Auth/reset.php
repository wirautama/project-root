<?= $this->extend('Auth/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Project</b>ROOT</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= lang('Auth.resetYourPassword') ?></p>
        <?= view('App\Views\Auth\_message_block') ?>
        <p><?= lang('Auth.enterCodeEmailPassword') ?></p>
        <form action="<?= url_to('reset-password') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group has-feedback">
                <label for="token"><?= lang('Auth.token') ?></label>
                <input type="text" class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.token') ?>" name="token" value="<?= old('token', $token ?? '') ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <div class="invalid-feedback">
                    <?= session('errors.token') ?>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="email"><?= lang('Auth.email') ?></label>
                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.email') ?>" name="email" value="<?= old('email'); ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="password"><?= lang('Auth.newPassword') ?></label>
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="pass_confirm"><?= lang('Auth.newPasswordRepeat') ?></label>
                <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <div class="invalid-feedback">
                    <?= session('errors.pass_confirm') ?>
                </div>

            </div>
            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.resetPassword') ?></button>
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