<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('master.barang.index');
    }

    public function create()
    {
        return view('master.barang.create');
    }
}
