<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Partneruser;

class Partner extends Model
{
    protected $table = 'partners';
    
    protected $fillable = [
    	'partnername',
        'country',
        'deflang',
        'active', 
    ];
    
    public function partnerUsers()
    {
        return $this->hasMany(PartnerUser::class, 'partnerid');
    }    
}
