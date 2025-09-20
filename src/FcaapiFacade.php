<?php

declare(strict_types=1);

namespace Cyborgfinance\Fcaregisterlaravel;

use Illuminate\Support\Facades\Facade;

/**
 * @see Fcaapi
 */
final class FcaapiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Fcaapi';
    }
}
