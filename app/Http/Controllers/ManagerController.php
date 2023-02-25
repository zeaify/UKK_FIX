<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function managerHome()
    {
        return view('managerHome');
    }
}
