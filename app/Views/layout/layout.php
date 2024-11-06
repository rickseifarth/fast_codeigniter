<?= $this->include('layout/head'); ?>

<body>

    <?= $this->include('layout/navbar'); ?>

    <main class="container mb-5" style="min-height: 30em;">
        <?= $this->include('layout/messages'); ?>
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('layout/footer'); ?>

</body>

</html>