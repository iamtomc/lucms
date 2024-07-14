<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'layout',
        'blocks', // JSON for sections data
        'sections', // JSON for sections data
        'meta_image',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'timestamps',
    ];

    protected $casts = [
        'blocks' => 'array',
        'sections' => 'array',
    ];

    public function blockable(): MorphTo
    {
        return $this->morphTo();
    }
}
