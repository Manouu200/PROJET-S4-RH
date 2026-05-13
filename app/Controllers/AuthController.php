<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class AuthController extends BaseController
{

    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $model = new EmployeeModel();
        $email = (string) $this->request->getPost('email');
        $password = (string) $this->request->getPost('password');

        $user = $model->login($email, $password);

        if ($user) {
            $role = strtolower((string) $user['role']);

            session()->set([
                'user_id'    => $user['id_employee'],
                'user_email' => $user['email'],
                'user_role'  => $role,
                'user_nom'   => $user['nom'],
                'isLoggedIn' => true
            ]);

            return match ($role) {
                'admin' => redirect()->to('/admin/dashboard'),
                'rh'    => redirect()->to('/rh/index'),
                default => redirect()->to('/employee/dashboard'),
            };
        }

        return redirect()->back()->with('error', 'Identifiants invalides');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
