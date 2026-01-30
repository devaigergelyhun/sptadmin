<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Partner;
use App\Models\Therapy;


class Partnertherapy extends Model
{
    protected $table = 'partnertherapies';
    
    protected $fillable = [
    	'partner_id', 
        'therapy_id'
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }
    
    public function therapy()
    {
        return $this->belongsTo(Therapy::class, 'therapy_id');
    }
    
}
