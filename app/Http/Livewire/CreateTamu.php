<?php

namespace App\Http\Livewire;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Livewire\Component;

class CreateTamu extends Component
{   
    // public $tamu;
    public $nama;
    public $kelamin;
    public $email;
    public $nohp;
    public $keperluan;
    public $tanggalDatang;

    public function render()
    {
        return view('livewire.create-tamu');
    }

    public function store() {
        $this->validate([
           'email' =>'nullable|email',
        ]);
        $instance = Tamu::create([
            'nama' => $this->nama,
            'kelamin' => $this->kelamin,
            'email' => $this->email ?? '',
            'nohp' => $this->nohp,
            'keperluan' => $this->keperluan,
            'tanggalDatang' => $this->tanggalDatang,
            'user_id' => auth()->id(),
        ]);

        $this->resetInput();

        $this->emit('tamuStored', $instance);
    }

    private function resetInput() {
        $this->nama = null;
        $this->kelamin = null;
        $this->email = null;
        $this->nohp = null;
        $this->keperluan = null;
        $this->tanggalDatang = null;
    }

}
