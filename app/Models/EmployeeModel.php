<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id_employee';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nom',
        'prenom',
        'email',
        'password',
        'role',
        'date_embauche',
        'actif',
        'id_department',
    ];
    protected $useTimestamps = false;
    protected $protectFields = true;

    public function login(string $email, string $password): ?array
    {
        $employee = $this->where('email', trim($email))
            ->where('actif', 1)
            ->first();

        if (! $employee) {
            return null;
        }

        $storedPassword = (string) ($employee['password'] ?? '');
        $isValid = password_verify($password, $storedPassword) || hash_equals($storedPassword, $password);

        return $isValid ? $employee : null;
    }
}
