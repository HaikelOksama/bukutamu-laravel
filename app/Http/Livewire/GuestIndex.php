<?php

namespace App\Http\Livewire;

use App\Models\Tamu;
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

    protected $listeners = [
        'tamuStored' => 'handleStoreEvent',
        ''
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

    public function destroy($id) {
        if($id){
            $instance = Tamu::find($id);
            $instance->delete();
            session()->flash('deleted', 'Tamu '.$instance['nama'].' Telah Dihapus');
        }
    }

    public function render()
    {

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
        });


        return view('livewire.guest-index', ['tamu' => $tamu->paginate($this->paginate)]);
    }

    public function resetMonth() {
        $this->month = null;
    }
    
    public function resetTimespan() {
        $this->awal = null;
        $this->akhir = null;
    }

}
