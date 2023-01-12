<?php

namespace App\Http\Livewire;

use App\Models\Tamu;
use Livewire\Component;

class PageTamu extends Component
{
    public function render()
    {
        return view('livewire.page-tamu');
    }
    public $nama;
    public $kelamin;
    public $email;
    public $nohp;
    public $keperluan;
    public $tanggalDatang;
    public $prefixHp = '+62';

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
