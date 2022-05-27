<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskripsiRumah extends Model
{
    use HasFactory;

    protected $table = "deskripsi_rumah";

    protected $guarded = [''];

    public $timestamps = false;

    public function getHarga(){
        return $this->belongsTo("App\Models\User", "harga", "id" );
    }
}
