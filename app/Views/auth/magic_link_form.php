<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= lang('Auth.useMagikLink') ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container d-flex justify-content-center p-5">
<div class="card col-8 shadow">
        <div class="card-body">
            <h5 class="card-title mb-5"><?= lang('Auth.useMagicLink') ?></h5>

            <?= form_open('magic-link') ?>
            <?= csrf_field() ?>

            <!-- Email -->
            <div class="form-floating mb-3">
                <?= form_input('email', old('email', ''), ['class' => 'form-control', 'inputmode' => 'email', 'autocomplete' => 'email', 'placeholder' => 'email']); ?>
                <?= form_label('E-mail', 'email'); ?>
            </div>


            <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <?= form_submit('submit', 'Enviar', ['class' => 'btn btn-primary btn-block']) ?>
                </div>

            <?= form_close();?>

            <p class="text-center"><a href="<?= url_to('login') ?>"><?= lang('Auth.backToLogin') ?></a></p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>