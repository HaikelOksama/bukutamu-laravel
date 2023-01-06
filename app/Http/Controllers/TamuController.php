<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index() {
        

        $tamu = Tamu::latest()->get();

        $tamuDateOrdered = Tamu::orderBy('tanggalDatang', 'asc')->get();

        // Get year value from tamu model for select option
        $yearList = $tamuDateOrdered->pluck('tanggalDatang')->map(function ($date) {
            return Carbon::parse($date)->year;})->unique();
        // dd($yearList);

        //Check if month and year exist in params  
        // if(request()->has(['month', 'year'])) {
        //     $month = request('month');
        //     $year = request('year');
        //     $tamu = Tamu::FilterByMonth($month, $year)->get();
        // }

        if(request()->has('month')) {
            $monthInput = request()->input('month');

            // Convert the month input to a timestamp using strtotime()
            $timestamp = strtotime($monthInput);

            // Separate the year and month using the date() function
            $year = date('Y', $timestamp);
            $month = date('m', $timestamp);
            $tamu = Tamu::FilterByMonth($month, $year)->get();
        }

        if(request()->has(['awal', 'akhir'])) {
            $awal = request('awal');
            $akhir = request('akhir');
            $tamu = Tamu::FilterByTimespan($awal, $akhir)->get();
        }

        return view('tamu.index', [
            'heading' => 'Data Tamu',
            'tamu' => $tamu,
            'yearList' => $yearList,
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
