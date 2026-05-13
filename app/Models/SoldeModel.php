<?php

namespace App\Models;

use CodeIgniter\Model;

class SoldeModel extends Model
{
    protected $table = 'soldes';
    protected $primaryKey = 'id_solde';
    protected $returnType = 'array';
    protected $allowedFields = [
        'id_employee',
        'id_congee',
        'annee',
        'jour_attribue',
        'jour_pris',
    ];
    protected $useTimestamps = false;
    protected $protectFields = true;
}
