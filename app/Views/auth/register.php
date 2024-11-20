<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= lang('Auth.register') ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="container d-flex justify-content-center p-5">
    <div class="card col-8 shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <?= lang('Auth.register') ?>
                </div>
                <div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= url_to('register') ?>" method="post">
                <?= csrf_field() ?>

                <?= inputEmail('email', lang('Auth.email')); ?>
                <?= inputText('username', lang('Auth.username')); ?>
                <?= inputPass('password', lang('Auth.password')); ?>
                <?= inputPass('password_confirm', lang('Auth.passwordConfirm')); ?>

                <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                </div>

                <p class="text-center"><?= lang('Auth.haveAccount') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.login') ?></a></p>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>