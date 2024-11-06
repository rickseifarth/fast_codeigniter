<@php

namespace {namespace};

use CodeIgniter\Model;

class {class} extends Model
{
<?php if (is_string($dbGroup)): ?>
    protected $DBGroup          = '{dbGroup}';
<?php endif; ?>
    protected $table            = '{table}';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = {return};
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    //NÃO SE ESQUEÇA DE INDICAR OS CAMPOS QUE SÃO AUTORIZADOS PARA AJUSTAR
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
