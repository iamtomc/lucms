<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Blockable
{
    public function blocks(): MorphMany;
}
