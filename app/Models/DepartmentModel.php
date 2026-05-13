<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'id_department';
    protected $returnType = 'array';
    protected $allowedFields = [
        'name',
    ];
    protected $useTimestamps = false;
    protected $protectFields = true;
}
