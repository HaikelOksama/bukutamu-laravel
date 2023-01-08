<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TamuFilterForm extends Component
{
    public $month;
    public $awal;
    public $akhir;

    protected $queryString = [
        'month'  => ['except' => ''],
        'awal'   => ['except' => ''],
        'akhir'  => ['except' => '']
    ];

    public function render()
    {
        $this->emit('filterTamu', $this->month, $this->awal, $this->akhir);
        return view('livewire.tamu-filter-form');
    }

    
    
}
