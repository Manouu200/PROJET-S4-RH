<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeCongeeModel extends Model
{
    protected $table = 'type_congee';
    protected $primaryKey = 'id_congee';
    protected $returnType = 'array';
    protected $allowedFields = [
        'libelle',
        'jour_annuel',
        'deductible',
    ];
    protected $useTimestamps = false;
    protected $protectFields = true;
}
