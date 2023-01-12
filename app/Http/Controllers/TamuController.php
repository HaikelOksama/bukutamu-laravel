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

    public function dashboard() {
        $tamu = Tamu::latest()->take(10)->get();
        // Convert the month input to a timestamp using strtotime()

        // Separate the year and month using the date() function
        $getYear = date('Y');
        $monthVal = date('m');
        
        $tamuThisMonth = Tamu::FilterByMonth($monthVal, $getYear)->get();
        $tamuToday = Tamu::where('tanggalDatang', date('Y-m-d'))->get();

        $query = Tamu::orderBy('tanggalDatang', 'asc')->selectRaw('MONTH(tanggalDatang) as month, YEAR(tanggalDatang) as year, COUNT(tanggalDatang) as total')
        ->groupBy(['month', 'year']);
        $tamuChart = $query->whereYear('tanggalDatang', date('Y'))->get();


        $monthList = [];
        foreach ($tamuChart as $data) {  
            array_push($monthList, $data->month);
        }
        $monthListC = [];

        foreach($monthList as $month){
            if($month === 1) {
                array_push($monthListC, "Januari");
            }
            if($month === 2) {
            array_push($monthListC, "Februari");
            }
            if($month === 3) {
                array_push($monthListC, "Maret");
            }
            if($month === 4) {
                array_push($monthListC, "April");
                }
            if($month === 5) {
            array_push($monthListC, "Mei");
            }
            if($month === 6) {
                array_push($monthListC, "Juni");
                } 
            if($month === 7) {
            array_push($monthListC, "Juli");
            }
            if($month === 8) {
                array_push($monthListC, "Agustus");
            }
            if($month === 9) {
                array_push($monthListC, "September");
                }
            if($month === 10) {
            array_push($monthListC, "Oktober");
            }
            if($month === 11) {
                array_push($monthListC, "November");
            }
            if($month == 12) {
            array_push($monthListC, "Desember");
            }
        }
        return view('tamu.dashboard', [
            'tamu' => $tamu,
            'thisMonth' => $tamuThisMonth,
            'todayData' => $tamuToday,
            'chartData' => $tamuChart,
            'chartLabel' => $monthListC,
            'getYear' => $getYear,
        ]);
    }

    public function kedatangan() {
        return view('tamu.kedatangan');
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

    public function laporan() {
        setlocale(LC_ALL, 'IND');
        $tamu = Tamu::latest()->get();
        // $tamuDateOrdered = Tamu::orderBy('tanggalDatang', 'asc')->get();

        // // Get year value from tamu model for select option
        // $yearList = $tamuDateOrdered->pluck('tanggalDatang')->map(function ($date) {
        //     return Carbon::parse($date)->year;})->unique();
        
        $heading = 'Data Tamu Kantor Pusat';

        if(request()->input('month') != null) {
            $monthInput = request()->input('month');

            // Convert the month input to a timestamp using strtotime()
            $timestamp = strtotime($monthInput);

            // Separate the year and month using the date() function
            $year = date('Y', $timestamp);
            $month = date('m', $timestamp);
            $monthName = date('F', $timestamp);
            $tamu = Tamu::FilterByMonth($month, $year)->get();
            $heading = $heading . ' Pada Bulan ' . $monthName . ' '. $year;
        }

        if(request()->input('akhir') != null) {

            $awal = request('awal');
            $akhir = request('akhir');
            $tamu = Tamu::FilterByTimespan($awal, $akhir)->get();

            $formatAwal = date('d-m-Y', strtotime($awal));
            $formatAkhir = date('d-m-Y', strtotime($akhir));
            $heading = $heading . ' Dari Tanggal '. $formatAwal . ' Hingga ' . $formatAkhir;
        }
        return view('tamu.laporan', ['tamu' => $tamu , 'heading' => $heading]);
    }

    public function statistic() {
        $tamuDateOrdered = Tamu::orderBy('tanggalDatang', 'asc')->get();

        // Get year value from tamu model for select option
        $yearList = $tamuDateOrdered->pluck('tanggalDatang')->map(function ($date) {
            return Carbon::parse($date)->year;})->unique();

        $query = Tamu::orderBy('tanggalDatang', 'asc')->selectRaw('MONTH(tanggalDatang) as month, YEAR(tanggalDatang) as year, COUNT(tanggalDatang) as total')
        ->groupBy(['month', 'year']);
        
        $tamuChart = $query->whereYear('tanggalDatang', date('Y'))->get();

        $getYear = date('Y');
        
        if(request()->input('year') != null) {
            $year = request()->input('year');
            $intYear = intval($year);
            $tamuChart = Tamu::orderBy('tanggalDatang', 'asc')->selectRaw('MONTH(tanggalDatang) as month, YEAR(tanggalDatang) as year, COUNT(tanggalDatang) as total')
            ->groupBy(['month', 'year'])->whereYear('tanggalDatang', $intYear)->get();
            $getYear = $year;
        }

        $monthList = [];
        foreach ($tamuChart as $data) {  
            array_push($monthList, $data->month);
        }
        $monthListC = [];

        foreach($monthList as $month){
            if($month === 1) {
                array_push($monthListC, "Januari");
            }
            if($month === 2) {
            array_push($monthListC, "Februari");
            }
            if($month === 3) {
                array_push($monthListC, "Maret");
            }
            if($month === 4) {
                array_push($monthListC, "April");
                }
            if($month === 5) {
            array_push($monthListC, "Mei");
            }
            if($month === 6) {
                array_push($monthListC, "Juni");
                } 
            if($month === 7) {
            array_push($monthListC, "Juli");
            }
            if($month === 8) {
                array_push($monthListC, "Agustus");
            }
            if($month === 9) {
                array_push($monthListC, "September");
                }
            if($month === 10) {
            array_push($monthListC, "Oktober");
            }
            if($month === 11) {
                array_push($monthListC, "November");
            }
            if($month == 12) {
            array_push($monthListC, "Desember");
            }
        }

        return view('tamu.statistik' , [
            'chartData' => $tamuChart,
            'chartLabel' => $monthListC,
            'getYear' => $getYear,
            'yearList' => $yearList
        ]);
    }


}
