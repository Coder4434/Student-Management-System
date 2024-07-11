<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\adminbilgisi;
use App\Models\OgrenciModel;

class Onay extends Model
{
    use HasFactory;

    protected $table = 'onay';

    protected $fillable = [
        'ogrid',
        'danismanid',
        'ogronay',
        'danismanonay',
        'donem'
    ];

    public function ogrenci()
    {
        return $this->belongsTo(OgrenciModel::class, 'ogrid');
    }

    public function danisman()
    {
        return $this->belongsTo(adminbilgisi::class, 'danismanid');
    }
}
