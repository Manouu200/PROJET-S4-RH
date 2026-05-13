<?php

namespace App\Models;

use CodeIgniter\Model;

class CongeModel extends Model
{
    protected $table = 'conges';
    protected $primaryKey = 'id_conge';
    protected $returnType = 'array';
    protected $allowedFields = [
        'id_employee',
        'type_congee',
        'date_debut',
        'date_fin',
        'nb_jours',
        'motif',
        'statut',
        'commentaire_rh',
        'traite_par',
    ];
    protected $useTimestamps = false;
    protected $protectFields = true;
}
