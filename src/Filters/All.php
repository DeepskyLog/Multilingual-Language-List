<?php

namespace DeepskyLog\Languages\Filters;

use Illuminate\Support\Collection;

class All
{
    public function filter(Collection $languages)
    {
        return $languages;
    }
}
