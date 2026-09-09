<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'question_fr',
        'question_en',
        'question_ar',
        'answer_fr',
        'answer_en',
        'answer_ar',
        'category',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Accessors
    public function getQuestionAttribute(): string
    {
        return $this->question_fr ?? $this->question_en ?? $this->question_ar;
    }

    public function getAnswerAttribute(): string
    {
        return $this->answer_fr ?? $this->answer_en ?? $this->answer_ar;
    }
}
