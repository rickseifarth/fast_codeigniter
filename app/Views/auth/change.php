<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?>Trocar Senha<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container d-flex justify-content-center p-5">
    <div class="card col-8 shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    Trocar Senha
                </div>
                <div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?= form_open('user/change') ?>
            <?= csrf_field() ?>

            <div class="form-floating mb-3">
                <?= form_input('password', old('password', ''), ['class' => 'form-control', 'autocomplete' => 'current-password', 'placeholder' => 'Senha Atual'], 'password'); ?>
                <?= form_label('Senha Atual', 'password'); ?>
            </div>
            <hr>
            <div class="form-floating mb-3">
                <?= form_input('new_password', old('new_password', ''), ['class' => 'form-control', 'placeholder' => 'Nova Senha'], 'password'); ?>
                <?= form_label('Nova Senha', 'new_password'); ?>
            </div>
            <div class="form-floating mb-3">
                <?= form_input('confirm_password', old('confirm_password', ''), ['class' => 'form-control', 'placeholder' => 'Confirmar nova senha'], 'password'); ?>
                <?= form_label('Confirmar nova senha', 'confirm_password'); ?>
            </div>

            <div class="d-grid col-12 col-md-8 mx-auto m-3">
                <?= form_submit('submit', 'Alterar Senha', ['class' => 'btn btn-primary btn-block']) ?>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>