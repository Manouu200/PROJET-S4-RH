<?php

namespace App\Controllers;

use App\Models\DepartmentModel;

class AdminController extends BaseController
{
    public function index(): string
    {
        return view('admin/dashboard');
    }

    public function employes(): string
    {
        return view('admin/employes');
    }

    public function departements(): string
    {
        $departmentModel = new DepartmentModel();
        $departements = $departmentModel
            ->orderBy('id_department', 'ASC')
            ->findAll();

        return view('admin/departements', [
            'departements' => $departements,
        ]);
    }

    public function createDepartement()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to(base_url('admin/departements'))
                ->withInput()
                ->with('error', implode(' ', $this->validator->getErrors()));
        }

        $name = trim((string) $this->request->getPost('name'));

        $departmentModel = new DepartmentModel();
        $alreadyExists = $departmentModel->where('name', $name)->first();
        if ($alreadyExists !== null) {
            return redirect()->to(base_url('admin/departements'))
                ->withInput()
                ->with('error', 'Ce département existe déjà.');
        }

        $saved = $departmentModel->insert([
            'name' => $name,
        ]);

        if ($saved === false) {
            return redirect()->to(base_url('admin/departements'))
                ->withInput()
                ->with('error', 'Impossible de créer le département.');
        }

        return redirect()->to(base_url('admin/departements'))
            ->with('success', 'Département créé avec succès.');
    }
}
