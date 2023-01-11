<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatisticChart extends Component
{   
    public $chartData;
    public $chartLabel;
    public $chartOptions;

    protected $listeners = [
        'updateChart' => 'handleUpdateChart'
    ];

    //this is broken
    // public function handleUpdateChart($tamuChart, $monthListC) {
    //     // $this->chartData = $tamuChart;
    //     // $this->chartLabel = $monthListC;
    // }

    public function mount($tamu, $label) {
        $this->chartData = $tamu;
        $this->chartLabel = $label;
    }

    public function render()
    {   
        return view('livewire.statistic-chart');
    }
}
