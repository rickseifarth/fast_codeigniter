<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= lang('Auth.login') ?> <?= $this->endSection() ?>

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
            <p><b><?= lang('Auth.checkYourEmail') ?></b></p>
            <p><?= lang('Auth.magicLinkDetails', [setting('Auth.magicLinkLifetime') / 60]) ?></p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>