<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EachAccountController extends Controller
{
    public function index()
    {
        return view('each_account.index');
    }
}
