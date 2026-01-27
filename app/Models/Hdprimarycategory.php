<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hdprimarycategory extends Model
{
    protected $fillable = ['primarycatname'];

    protected $casts = [
        'primarycatname' => 'array',
    ];

    public function getPrimarycatnameTranslatedAttribute(): string
    {
        $locale = app()->getLocale();
        $names = $this->primarycatname;

        return $names[$locale]
            ?? $names['en']
            ?? reset($names)
            ?? '';
    }
    
    public function getPricatnameAttribute(): string
    {
        $locale = app()->getLocale();
        $names = $this->primarycatname;

        return $names[$locale]
            ?? $names['en']
            ?? reset($names)
            ?? '';
    }
    
}
