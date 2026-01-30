<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Partneruser;
use App\Models\Partnertherapy;

class Partner extends Model
{
    protected $table = 'partners';
    
    protected $fillable = [
    	'partnername',
        'country',
        'deflang',
        'active', 
    ];
    
    public function partnerusers()
    {
        return $this->hasMany(Partneruser::class, 'partnerid');
    }    
    
    public function partnertherapies()
    {
        return $this->hasMany(Partnertherapy::class, 'partner_id');
    }    
}
