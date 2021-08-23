<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kategori',
        'alasan',
        'wali_murid',
        'ttd',
        'tanggal',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
