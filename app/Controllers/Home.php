<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('temp/header');
        echo view('temp/navbar');
        echo view('admin/dashboard');
    }

}
