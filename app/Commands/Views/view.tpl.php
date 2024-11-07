<?@= $this->extend('layout/layout') ?>
<?@= $this->section('title') ?>{class}<?@= $this->endSection() ?>

<?@= $this->section('content') ?>
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    {class}
                </div>
                <div>
                    <a href="<?@=url_to('{class}::add')?>" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Adicionar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="tabela" class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Campo 1</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?@php foreach(${class} as $item):?>
                        <tr>
                            <td><?@= $item['id']?></td>
                            <td><?@= $item['campo1']?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a title="Editar" href="<?@= url_to("{class}::edit", $item['id'])?>" class="btn btn-outline-primary"><i class="fa-regular fa-pen-to-square"></i> Editar</a>
                                    <a title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este registro?');" href="<?@= url_to('{class}::delete', $item['id']) ?>" class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i> Deletar</a>
                                </div>
                            </td>
                        </tr>
                    <?@php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?@= $this->endSection() ?>
<?@= $this->section('scripts') ?>
<script>
    new DataTable('#tabela', {
        language: {
            info: 'Exibindo página _PAGE_ de _PAGES_',
            infoEmpty: 'Sem registros',
            emptyTable: 'Sem Registros',
            infoFiltered: '(filtrado de _MAX_ registros)',
            lengthMenu: 'Exibindo _MENU_ registros por página',
            zeroRecords: 'Nada encontrado - Desculpe',
            search: 'Localizar'

        }
    });
</script>
<?@= $this->endSection() ?>