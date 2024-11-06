<?@= $this->extend('layout/layout') ?>
<?@= $this->section('title') ?>Manutenção de {teste}<?@= $this->endSection() ?>

<?@= $this->section('content') ?>
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                {teste}
                </div>
                <div>
                    <a href="<?@= url_to('{teste2}') ?>" class="btn btn-primary"><i class="fa-solid fa-arrow-left-long"></i> Voltar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?@= form_open('{teste2}/save') ?>
            <?@= csrf_field() ?>
            <?@= form_hidden('id', isset(${teste3}['id'])? ${teste3}["id"]:old('id', '')) ?>
            <div class="form-floating mb-4">
                <?@= form_input('campo1', old('campo1', isset(${teste3}['campo1'])? ${teste3}["campo1"]: ''), ['class' => 'form-control', 'placeholder' => 'placeholder']) ?>
                <?@= form_label('campo1', 'campo1') ?>
            </div>

            <div class="d-grid col-12 col-md-8 mx-auto m-3">
                <?@= form_submit('submit', 'Salvar', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
            <?@= form_close() ?>
        </div>
    </div>
</div>
<?@= $this->endSection() ?>