<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use function view;

class AdminController extends Controller
{
    public function index()
    {
        return view('main.index');
    }
}
