<!-- navbar -->
<nav class="navbar navbar-expand-md bg-body-secondary shadow mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>"><i class="fa-solid fa-circle"></i> Sua aplicação <i class="fa-solid fa-spider"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-end">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0 ">
                    <?php if (auth()->user() == null): ?>
                        <li class="nav-item fw-bold "><?= anchor('login', 'Login', ['class' => 'nav-link']) ?></li>
                        <li class="nav-item fw-bold "><?= anchor('register', 'Registro', ['class' => 'nav-link']) ?></li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= auth()->user()->email ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?= anchor('teste', 'Teste', ['class' => 'dropdown-item fw-bold '])?></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><?= anchor('logout', 'Sair', ['class' => 'dropdown-item fw-bold '])?></li>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</nav>