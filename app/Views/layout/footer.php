<br>
<div class="container-fluid bg-light" style="position: fixed; bottom: 0;">
    <footer class="footer">
        <ul class="nav justify-content-center border-bottom mb-3">
        </ul>
        <p class="text-center text-body-secondary ">© <?= date('Y') ?> Sua Empresa - xxxx</p>
    </footer>
</div>
<?= script_tag('js/bootstrap.bundle.min.js'); ?>
<?= script_tag('js/all.min.js'); ?>
<?= script_tag('js/jquery.min.js'); ?>
<?= script_tag('js/datatables.min.js'); ?>
<?= script_tag('js/trumbowyg.min.js'); ?>

<?= $this->renderSection('scripts') ?>