<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hdsecondarycategory extends Model
{
    protected $fillable = ['secondarycatname'];

    protected $casts = [
        'secondarycatname' => 'array',
    ];

    public function getSecondarycatnameTranslatedAttribute(): string
    {
        $locale = app()->getLocale();
        $names = $this->secondarycatname;

        return $names[$locale]
            ?? $names['en']
            ?? reset($names)
            ?? '';
    }
    
    public function getSeccatnameAttribute(): string
    {
        $locale = app()->getLocale();
        $names = $this->secondarycatname;

        return $names[$locale]
            ?? $names['en']
            ?? reset($names)
            ?? '';
    }
    
}
