<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guard_name = 'web';

    // Get translatable content based on current locale
    public function getTranslatableContent($baseAttribute, $locales = ['fr', 'en', 'ar'])
    {
        $locale = app()->getLocale();
        
        foreach ($locales as $loc) {
            $attribute = "{$baseAttribute}_{$loc}";
            if ($this->getAttribute($attribute)) {
                return $this->getAttribute($attribute);
            }
        }
        
        return null;
    }

    // Set translatable content
    public function setTranslatableContent($baseAttribute, $value, $locale)
    {
        $attribute = "{$baseAttribute}_{$locale}";
        $this->$attribute = $value;
        return $this;
    }
}
