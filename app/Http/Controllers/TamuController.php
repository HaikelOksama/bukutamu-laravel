<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index() {
        return view('tamu.index', [
            'heading' => 'Data Tamu',
            'tamu' => Tamu::all(),
        ]);
    }

    public function create() {
        return view('tamu.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        $formfields = $request->validate([
            'nama' => 'required',
            'email' =>['nullable','email'],
            'kelamin' => 'required',
            'nohp' => 'required',
            'keperluan' => 'required',
            'tanggalDatang' => 'required',
        ]);
        Tamu::create($formfields);
        return redirect('/tamu')->with('message', 'Data Tamu berhasil ditambahkan');
    }

    public function show(Tamu $tamu) {
        return view('tamu.show', [
            'tamu' => $tamu,
        ]);
    }

    public function edit(Tamu $tamu) {
        return view('tamu.edit', ['tamu' => $tamu]);
    }

    public function update(Tamu $tamu, Request $request) {
        $formfields = $request->validate([
            'nama' => 'required',
            'email' => ['nullable','email'],
            'kelamin' => 'required',
            'nohp' => 'required',
            'keperluan' => 'required',
            'tanggalDatang' => 'required',
        ]);

        $tamu->update($formfields);
        return redirect()->route('detail', $tamu->id)->with('message', 'Data berhasil Diupdate');
    }

    public function destroy(Tamu $tamu) {
        $tamu->delete();
        return redirect()->route('index')->with('message', 'Data tamu berhasil dihapus');
    }
}
