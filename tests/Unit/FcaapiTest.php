<?php

use Cyborgfinance\Fcaregisterlaravel\Fcaapi;

test('package service provider can be instantiated', function () {
    $provider = new \Cyborgfinance\Fcaregisterlaravel\FcaregisterlaravelServiceProvider(app());
    expect($provider)->toBeInstanceOf(\Cyborgfinance\Fcaregisterlaravel\FcaregisterlaravelServiceProvider::class);
});

test('Fcaapi class can be instantiated', function () {
    $fcaapi = new Fcaapi();
    expect($fcaapi)->toBeInstanceOf(Fcaapi::class);
});

test('firmDetails method requires positive integer FRN number', function () {
    expect(fn() => Fcaapi::firmDetails(0))
        ->toThrow(\Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'FCA FRN NUMBER MUST BE A POSITIVE INTEGER');
    
    expect(fn() => Fcaapi::firmDetails(-1))
        ->toThrow(\Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'FCA FRN NUMBER MUST BE A POSITIVE INTEGER');
});

test('firmDetails method accepts valid FRN number', function () {
    // Test that the method accepts a valid FRN number without throwing validation errors
    // We expect it to throw an API error since we don't have valid credentials, but not a validation error
    expect(fn() => Fcaapi::firmDetails(123456))
        ->not->toThrow(\Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class);
});

test('search method requires search parameter', function () {
    expect(fn() => Fcaapi::search(''))
        ->toThrow(\Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'NO SEARCH PARAMETER PROVIDED');
});

test('individualDetails method requires IRN number', function () {
    expect(fn() => Fcaapi::individualDetails(''))
        ->toThrow(\Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'NO FCA IRN NUMBER PROVIDED');
});

test('all firm methods require positive integer FRN number', function () {
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
        'firmDisciplinaryHistory'
    ];
    
    foreach ($methods as $method) {
        expect(fn() => Fcaapi::$method(0))
            ->toThrow(\Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException::class, 'FCA FRN NUMBER MUST BE A POSITIVE INTEGER');
    }
});