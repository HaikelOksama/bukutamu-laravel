<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    public $table = "tamu";

    public function scopeFilterByMonth($query, $month, $year) {
        return $query->whereYear('tanggalDatang', $year)
                    ->whereMonth('tanggalDatang', $month);
        
    }

    public function user() {
        return $this->belongsTo(User::class, "user_id"); 
    }
    
}
