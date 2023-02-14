<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nisn',
        'jenis_kelamin',
        'asal_sekolah',
        'asal_sekolah_lain',
        'email',
        'phone_me',
        'phone_dad',
        'phone_mom',
    ];
}
