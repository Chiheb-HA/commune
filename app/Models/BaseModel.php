<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guard_name = 'web';

    // Get translatable content based on current locale
    public function getTranslatableContent($baseAttribute, $locales = ['ar', 'fr', 'en'])
    {
        $currentLocale = app()->getLocale();
        
        // First try the current locale
        $currentAttribute = "{$baseAttribute}_{$currentLocale}";
        if ($this->getAttribute($currentAttribute)) {
            return $this->getAttribute($currentAttribute);
        }
        
        // Then try Arabic as primary fallback
        $arabicAttribute = "{$baseAttribute}_ar";
        if ($this->getAttribute($arabicAttribute)) {
            return $this->getAttribute($arabicAttribute);
        }
        
        // Then try other fallback locales (excluding current and Arabic)
        $fallbackLocales = array_filter($locales, function($loc) use ($currentLocale) {
            return $loc !== $currentLocale && $loc !== 'ar';
        });
        
        foreach ($fallbackLocales as $loc) {
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
