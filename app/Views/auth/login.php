<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= lang('Auth.login') ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container d-flex justify-content-center p-5">
    <div class="card col-8 shadow">
        <div class="card-body">
            <h5 class="card-title mb-5"><?= lang('Auth.login') ?></h5>

            <?= form_open('login') ?>
            <?= csrf_field() ?>

            <div class="form-floating mb-3">
                <?= form_input('email', old('email', ''), ['class' => 'form-control', 'inputmode' => 'email', 'autocomplete' => 'email', 'placeholder' => 'email']); ?>
                <?= form_label('E-mail', 'email'); ?>
            </div>

            <div class="form-floating mb-3">
                <?= form_input('password', old('password', ''), ['class' => 'form-control', 'autocomplete' => 'current-password', 'placeholder' => 'Senha'], 'password'); ?>
                <?= form_label('Senha', 'password'); ?>

                <!-- Remember me -->
                <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
                            <?= lang('Auth.rememberMe') ?>
                        </label>
                    </div>
                <?php endif; ?>



                <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <?= form_submit('submit', 'Acessar', ['class' => 'btn btn-primary btn-block']) ?>
                </div>

                <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                    <p class="text-center"><?= lang('Auth.forgotPassword') ?> <a href="<?= url_to('magic-link') ?>"><?= lang('Auth.useMagicLink') ?></a></p>
                <?php endif ?>

                <?php if (setting('Auth.allowRegistration')) : ?>
                    <p class="text-center"><?= lang('Auth.needAccount') ?> <a href="<?= url_to('register') ?>"><?= lang('Auth.register') ?></a></p>
                <?php endif ?>

                <?= form_close() ?>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>