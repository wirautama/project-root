<?= $this->extend('Auth/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Project</b>ROOT</a>
    </div>

    <div class="register-box-body">

        <p class="login-box-msg"><?= lang('Auth.register') ?></p>
        <?= view('App\Views\Auth\_message_block') ?>
        <form action="<?= url_to('register') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group has-feedback">
                <label for="username"><?= lang('Auth.username') ?></label>
                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.username') ?>" name="username" value="<?= old('username') ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <label for="fullname">Fullname</label>
                <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" placeholder="Fullname" name="fullname" value="<?= old('fullname') ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <label for="email"><?= lang('Auth.email') ?></label>
                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.email') ?>" name="email" value="<?= old('email') ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="password"><?= lang('Auth.password') ?></label>
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" name="password" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><?= lang('Auth.register') ?></button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p><?= lang('Auth.alreadyRegistered') ?></p><a href="<?= url_to('login') ?>" class="text-center"><?= lang('Auth.signIn') ?></a>
    </div>
    <!-- /.form-box -->
</div>
<?= $this->endSection(); ?>