<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= lang('Auth.useMagikLink') ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container d-flex justify-content-center p-5">
<div class="card col-8 shadow">
    <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <?= lang('Auth.useMagicLink') ?>
                </div>
                <div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?= form_open('magic-link') ?>
            <?= csrf_field() ?>

            <?= inputEmail('email', lang('Auth.email')); ?>

            <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <?= form_submit('submit', 'Enviar', ['class' => 'btn btn-primary btn-block']) ?>
                </div>

            <?= form_close();?>

            <p class="text-center"><a href="<?= url_to('login') ?>"><?= lang('Auth.backToLogin') ?></a></p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>