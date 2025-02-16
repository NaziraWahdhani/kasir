<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $data = Satuan::all();
        return view('master.satuan.index', compact('data'));
    }

    public function create()
    {
        return view('master.satuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'satuan' => 'required',
        ]);

        Satuan::create($request->all());

        return redirect()->route('master.satuan')->with('success', 'Data berhasil ditambah');
    }
}
