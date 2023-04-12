<?= $this->extend('Auth/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="login-box">
	<div class="login-logo">
		<a href=""><b>Project</b>ROOT</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg"><?= lang('Auth.loginTitle') ?></p>
		<?= view('App\Views\Auth\_message_block') ?>
		<form action="<?= url_to('login') ?>" method="post">
			<?= csrf_field() ?>
			<?php if ($config->validFields === ['email']) : ?>
				<div class="form-group has-feedback">
					<label for="login"><?= lang('Auth.email') ?></label>
					<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.email') ?>" name="login">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					<div class="invalid-feedback">
						<?= session('errors.login') ?>
					</div>
				</div>
			<?php else : ?>
				<div class="form-group has-feedback">
					<label for="login"><?= lang('Auth.emailOrUsername') ?></label>
					<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.emailOrUsername') ?>" name="login">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					<div class="invalid-feedback">
						<?= session('errors.login') ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="form-group has-feedback">
				<label for="password"><?= lang('Auth.password') ?></label>
				<input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" name="password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<div class="invalid-feedback">
					<?= session('errors.password') ?>
				</div>
			</div>
			<?php if ($config->allowRemembering) : ?>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox" name="remember" <?php if (old('remember')) : ?> checked <?php endif ?>> Remember Me
							</label>
						</div>
					</div>
				<?php endif; ?>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat"><?= lang('Auth.loginAction') ?></button>
				</div>
				<!-- /.col -->
				</div>
		</form>
		<!-- /.social-auth-links -->
		<?php if ($config->activeResetter) : ?>
			<a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a><br>
		<?php endif; ?>
		<?php if ($config->allowRegistration) : ?>
			<a href="<?= url_to('register') ?>" class="text-center"><?= lang('Auth.needAnAccount') ?></a>
		<?php endif; ?>

	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?= $this->endSection(); ?>