<?php

namespace Alfrasc\MatomoTracker\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelMatomoTracker extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'matomotracker';
    }
}
