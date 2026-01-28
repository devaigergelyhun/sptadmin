<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partner;

class Partneruser extends Model
{
    
    protected $table = 'partnerusers';
    
    protected $fillable = [
        'partnerid', 
        'name',
        'email',
        'password',
        'isadmin', 
        'isactive',
        'loginname',
    ];
    
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];
    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }
    
    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partnerid');
    }
    
}


