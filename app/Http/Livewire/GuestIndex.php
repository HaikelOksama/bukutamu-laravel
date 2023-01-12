<?php

namespace App\Http\Livewire;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;


class GuestIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;

    // Query Filtering
    public $month;
    public $awal;
    public $akhir;
    public $search;

    protected $listeners = [
        'tamuStored' => 'handleStoreEvent',
        'updateTamu' => 'handleUpdateTamu'
    ];

    protected $queryString = [
        'month'  => ['except' => ''],
        'awal'   => ['except' => ''],
        'akhir'  => ['except' => '']
    ];

    public function handleStoreEvent($instance) {
        // dd($instance);
        session()->flash('message', 'Tamu '.$instance['nama'].' Berhasil ditambahkan!');
    }

    public function getTamu($id) {
        $tamu = Tamu::find($id);
        $this->emit('getTamu', $tamu);
    }

    public function handleUpdateTamu($instance) {
        session()->flash('message', 'Tamu ' .$instance['nama'] . 'Telah diupdate!');
    }

    public function destroy($id) {
        if($id){
            $instance = Tamu::find($id);
            $instance->delete();
            session()->flash('deleted', 'Tamu '.$instance['nama'].' Telah Dihapus');
            $this->emit('tamuDestroyed', $instance);
        }
    }

    public function render() {
        $tamu = Tamu::latest()
        ->when($this->month, function ($query) {
            $monthInput = $this->month;

            // Convert the month input to a timestamp using strtotime()
            $timestamp = strtotime($monthInput);

            // Separate the year and month using the date() function
            $year = date('Y', $timestamp);
            $monthVal = date('m', $timestamp);
            return $query->FilterByMonth($monthVal, $year);
        })
        ->when($this->awal && $this->akhir, function ($query){
            $awal = $this->awal;
            $akhir = $this->akhir;
            return $query->FilterByTimespan($awal, $akhir);
        })
        ->when($this->search, function ($query){
            $search = $this->search;
            return $query->FilterSearch($search);
        })
        ;
        
        $tamuChart = Tamu::orderBy('tanggalDatang', 'asc')->selectRaw('MONTH(tanggalDatang) as month, YEAR(tanggalDatang) as year, COUNT(tanggalDatang) as total')
        ->groupBy(['month', 'year'])->whereYear('tanggalDatang', date('Y'))->get();
        
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

        $this->emit('allTamu', $tamu);
        $this->emit('updateChart', $tamuChart, $monthListC);

        return view('livewire.guest-index', [
            'tamu' => $tamu->paginate($this->paginate), 
            'chartData' => $tamuChart,
            'monthData' => $monthListC,
        ]);
    }

    public function allTamu($tamu) {
        $this->emit('allTamu', $tamu);
    }

    public function resetData(Request $request) {
        $request->flush();
        $this->resetMonth();
        $this->resetTimespan();
        $this->search = null;
    }

    public function resetMonth() {
        $this->month = null;
    }
    
    public function resetTimespan() {
        $this->awal = null;
        $this->akhir = null;
    }

}
