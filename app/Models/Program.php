<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DersListesi;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Program extends Model
{
    protected $table = 'program';

    protected $fillable = [
        'ders_id',
        'gun',
        'saat',
    ];

    public function Ders(): HasOne
    {
        return $this->hasOne(DersListesi::class, "id", "ders_id");
    }
}

