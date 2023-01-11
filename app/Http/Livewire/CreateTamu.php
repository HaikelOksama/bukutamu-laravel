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
    public $prefixHp = '+62';

    public function render()
    {
        return view('livewire.create-tamu');
    }

    public function store() {
        $input  = $this->validate([
            'nama' => 'required',
            'kelamin' => 'required',
            'email' =>'nullable|email',
            'nohp' => 'numeric|max_digits:15',
            'keperluan' =>'required',
            'tanggalDatang' =>'required|date',
        ]);

        $input['nohp'] = $this->prefixHp . $input['nohp'];
        $input['user_id'] = auth()->id();

        $instance = Tamu::create($input);

        // $instance = Tamu::create([
        //     'nama' => $this->nama,
        //     'kelamin' => $this->kelamin,
        //     'email' => $this->email ?? '',
        //     'nohp' = $this->prefixHp + $this->nohp,
        //     'keperluan' => $this->keperluan,
        //     'tanggalDatang' => $this->tanggalDatang,
        //     'user_id' => auth()->id(),
        // ]);

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
