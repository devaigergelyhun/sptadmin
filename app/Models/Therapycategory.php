<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Therapycategory extends Model
{
    protected $fillable = ['therapycat'];

    protected $casts = [
        'therapycat' => 'array',
    ];

    public function getTherapycatnameAttribute(): string
    {
        $locale = app()->getLocale();
        $names = $this->therapycat ?? [];

        return $names[$locale]
            ?? $names['en']
            ?? reset($names)
            ?? '';
    }
}
