<?php

declare(strict_types=1);

use Cyborgfinance\Fcaregisterlaravel\Fcaapi;

test('package service provider can be instantiated', function (): void {
    $provider = new Cyborgfinance\Fcaregisterlaravel\FcaregisterlaravelServiceProvider(app());
    expect($provider)->toBeInstanceOf(Cyborgfinance\Fcaregisterlaravel\FcaregisterlaravelServiceProvider::class);
});

test('Fcaapi class can be instantiated', function (): void {
    $fcaapi = new Fcaapi;
    expect($fcaapi)->toBeInstanceOf(Fcaapi::class);
});

test('firmDetails method requires positive integer FRN number', function (): void {
    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::firmDetails(0))
        ->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'FCA FRN NUMBER MUST BE A POSITIVE INTEGER');

    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::firmDetails(-1))
        ->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'FCA FRN NUMBER MUST BE A POSITIVE INTEGER');
});

test('firmDetails method accepts valid FRN number', function (): void {
    // Test that the method accepts a valid FRN number without throwing validation errors
    // We expect it to throw an API error since we don't have valid credentials, but not a validation error
    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::firmDetails(123456))
        ->not->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class);
});

test('search method requires search parameter', function (): void {
    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::search(''))
        ->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'NO SEARCH PARAMETER PROVIDED');
});

test('individualDetails method requires IRN number', function (): void {
    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::individualDetails(''))
        ->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'NO FCA IRN NUMBER PROVIDED');
});

test('all firm methods require positive integer FRN number', function (): void {
    $methods = [
        'firmIndividuals',
        'firmName',
        'firmRequirements',
        'firmPermissions',
        'firmPassports',
        'firmRegulators',
        'firmAppointedRepresentatives',
        'firmAddress',
        'firmWaivers',
        'firmExclusions',
        'firmDisciplinaryHistory',
        'firmControlledFunctions',
    ];

    foreach ($methods as $method) {
        expect(fn () => Fcaapi::$method(0))
            ->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'FCA FRN NUMBER MUST BE A POSITIVE INTEGER');
    }
});

test('requirementsInvestmentTypes method requires valid parameters', function (): void {
    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::requirementsInvestmentTypes(0, 'REQ123'))
        ->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'FCA FRN NUMBER MUST BE A POSITIVE INTEGER');

    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::requirementsInvestmentTypes(123456, ''))
        ->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'NO REQUIREMENT REFERENCE PROVIDED');
});

test('individualDisciplinaryHistory method requires IRN number', function (): void {
    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::individualDisciplinaryHistory(''))
        ->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'NO FCA IRN NUMBER PROVIDED');
});

test('product methods require positive integer FRN number', function (): void {
    $methods = [
        'productDetails',
        'productOtherNames',
        'productSubfunds',
    ];

    foreach ($methods as $method) {
        expect(fn () => Fcaapi::$method(0))
            ->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'FCA FRN NUMBER MUST BE A POSITIVE INTEGER');
    }
});

test('search method validates search type parameter', function (): void {
    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::search('test', 'invalid_type'))
        ->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'INVALID SEARCH TYPE. MUST BE ONE OF: firm, individual, fund');

    // Valid types should not throw validation exceptions
    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::search('test', 'firm'))
        ->not->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class);

    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::search('test', 'individual'))
        ->not->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class);

    expect(fn (): Illuminate\Http\Client\Response => Fcaapi::search('test', 'fund'))
        ->not->toThrow(Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class);
});
