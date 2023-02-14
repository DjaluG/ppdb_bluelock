<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_bank',
        'nama_bank_lain',
        'pemilik',
        'nominal',
        'bukti',
        'status',
        'user_id',
    ];

    
    public function user(){
        return $this->belongsTo(User::class,  'user_id');
    }
}
