<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class GithubScore extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Services\GithubScore::class;
    }
}
