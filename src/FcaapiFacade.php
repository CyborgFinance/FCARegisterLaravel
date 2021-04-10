<?php

namespace Cyborgfinance\Fcaregisterlaravel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Cyborgfinance\Fcaregisterlaravel\Fcaapi
 */
class FcaapiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Fcaapi';
    }
}
