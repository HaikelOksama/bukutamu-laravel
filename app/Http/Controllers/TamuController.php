<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\User;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index() {
        $tamu = Tamu::latest()->get();
        //Check if month and year exist in params  
        if(request()->has(['month', 'year'])) {
            $month = request('month');
            $year = request('year');
            $tamu = Tamu::FilterByMonth($month, $year)->get();
        }
        return view('tamu.index', [
            'heading' => 'Data Tamu',
            'tamu' => $tamu,
        ]);
    }

    public function listUser(User $id) {
        return view('tamu.listUser', [
            'tamu' => $id->tamu,
        ]);
    }

    public function create() {
        return view('tamu.create');
    }

    public function store(Request $request) {
        $formfields = $request->validate([
            'nama' => 'required',
            'email' =>['nullable','email'],
            'kelamin' => 'required',
            'nohp' => 'required',
            'keperluan' => 'required',
            'tanggalDatang' => 'required',
        ]);

        // Store the user_id data 
        $formfields['user_id'] = auth()->id();

        Tamu::create($formfields);
        return redirect('/tamu')->with('message', 'Data Tamu berhasil ditambahkan');
    }

    public function show(Tamu $tamu) {
        return view('tamu.show', [
            'tamu' => $tamu,
        ]);
    }

    public function edit(Tamu $tamu) {
        if($tamu->user_id != auth()->id()) {
            dd('This guy not allowed');
        }
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
