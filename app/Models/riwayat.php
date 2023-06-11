<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    use HasFactory;
    protected $table ="riwayat";
    protected $fillable=['judul', 'tipe', 'tahun_mulai', 'tahun_akhir', 'info1', 'info2', 'info3', 'isi'];

    public function getTahunAkhirAttribute() {
        if($this->attributes['tahun_akhir'] === null) {
            return "Present";
        }
        else{
            return $this->attributes['tahun_akhir'];
        }
    }
}

