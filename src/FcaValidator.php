<?php

declare(strict_types=1);

namespace Cyborgfinance\Fcaregisterlaravel;

use Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException;

final class FcaValidator
{
    public static function validateFrnNumber(int $fcaFrnNumber): void
    {
        if ($fcaFrnNumber <= 0) {
            throw new FcaValidationException('FCA FRN NUMBER MUST BE A POSITIVE INTEGER');
        }
    }

    public static function validateIrnNumber(string $fcaIrnNumber): void
    {
        if (in_array(mb_trim($fcaIrnNumber), ['', '0'], true)) {
            throw new FcaValidationException('NO FCA IRN NUMBER PROVIDED');
        }
    }

    public static function validateCountry(string $country): void
    {
        if ($country === '' || $country === '0') {
            throw new FcaValidationException('NO FCA COUNTRY PROVIDED');
        }
    }

    public static function validateSearch(string $search): void
    {
        if ($search === '' || $search === '0') {
            throw new FcaValidationException('NO SEARCH PARAMETER PROVIDED');
        }
    }

    public static function validateReqRef(string $reqRef): void
    {
        if (in_array(mb_trim($reqRef), ['', '0'], true)) {
            throw new FcaValidationException('NO REQUIREMENT REFERENCE PROVIDED');
        }
    }

    public static function validateSearchType(string $type): void
    {
        $validTypes = ['firm', 'individual', 'fund'];
        if (! in_array(mb_strtolower($type), $validTypes)) {
            throw new FcaValidationException('INVALID SEARCH TYPE. MUST BE ONE OF: '.implode(', ', $validTypes));
        }
    }
}
