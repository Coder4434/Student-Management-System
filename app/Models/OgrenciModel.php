<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Bu sınıfı kullanıyoruz
use Illuminate\Notifications\Notifiable;
class OgrenciModel extends Authenticatable
{
    use HasFactory;

    protected $table="ogrenci";

    protected $guarded=[];
    protected $casts = [
        'ders_id' => 'array', // JSON sütunu dizi olarak belirlenir
    ];

}
