<?php

namespace App\Controllers;

class RhController extends BaseController
{
    public function index(): string
    {
        return view('rh/index');
    }
}
