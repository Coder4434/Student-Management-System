<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinifModel extends Model
{
    use HasFactory;

    protected $table="sinif";

    protected $guarded=[];
}
