<?php

namespace App\Controllers;

class EmployeeController extends BaseController
{
    public function index(): string
    {
        return view('employe/dashboard');
    }
}
