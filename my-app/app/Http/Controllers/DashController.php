<?php
namespace App\Http\Controllers;

class DashController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
