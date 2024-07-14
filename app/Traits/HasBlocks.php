<?php

namespace App\Traits;

use App\Models\Page;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasBlocks
{
    public function blocks(): MorphMany
    {
        return $this->morphMany(Page::class, 'blockable');
    }
}
