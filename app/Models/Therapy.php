<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Therapy extends Model
{
    protected $table = 'therapies';
    
    protected $casts = [
        'therapyname' => 'array',
        'therapyinfo' => 'array',
    ];

    protected $fillable = [
        'ptid',
        'therapyname',
        'therapycategoryid', 
        'hdprimarycategoryid',
        'hdsecondarycategoryid',
        'lowpressure',
	'midpressure',
	'highpressure',
        'temperature',
        'timerangeshort',
        'timerangemiddle',
        'timerangelong',
        'therapyinfo',
    ];
    
    // aktuális nyelv szerinti név
    public function getNameAttribute(): string
    {
        $locale = app()->getLocale();
        $data = $this->therapyname ?? [];

        return $data[$locale]
            ?? $data['en']
            ?? reset($data)
            ?? '';
    }

    // aktuális nyelv szerinti info
    public function getInfoAttribute(): string
    {
        $locale = app()->getLocale();
        $data = $this->therapyinfo ?? [];

        return $data[$locale]
            ?? $data['en']
            ?? reset($data)
            ?? '';
    }
}
