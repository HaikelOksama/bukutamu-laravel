<?php

namespace App\Http\Livewire;

use App\Models\Tamu;
use Livewire\Component;

class UpdateTamu extends Component
{
    public $idTamu;
    public $nama;
    public $kelamin;
    public $email;
    public $nohp;
    public $keperluan;
    public $tanggalDatang;
    public $prefixHp = '+62';

    public function render()
    {
        return view('livewire.update-tamu');
    }

    protected $listeners = [
        'getTamu' => 'showTamu',
    ];

    public function showTamu($tamu){
        $this->idTamu = $tamu['id'];
        $this->nama = $tamu['nama'];
        $this->kelamin = $tamu['kelamin'];
        $this->email = $tamu['email'];
        $this->nohp = str_replace('+62', '', $tamu['noHp']);
        $this->keperluan = $tamu['keperluan'];
        $this->tanggalDatang = $tamu['tanggalDatang'];
    }

    public function update() {
        $input = $this->validate([
            'nama' => 'required',
            'kelamin' => 'required',
            'email' =>'nullable|email',
            'nohp' => 'numeric|max_digits:15',
            'keperluan' =>'required',
            'tanggalDatang' =>'required|date',
         ]);
        
        $input['nohp'] = $this->prefixHp . $input['nohp'];
        $instance = Tamu::find($this->idTamu);
        $instance->update($input);

        $this->emit('updateTamu' , $instance);
    }

    public function resetData() {
        $this->idTamu = null;
        $this->nama = null;
        $this->kelamin = null;
        $this->email = null;
        $this->nohp = null;
        $this->keperluan = null;
        $this->tanggalDatang = null;
    }
}
