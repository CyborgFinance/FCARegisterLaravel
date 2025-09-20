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

test('firmDetails method requires FRN number', function () {
    expect(fn() => Fcaapi::firmDetails())
        ->toThrow(\Exception::class, 'NO FCA FRN NUMBER PROVIDED');
});

test('firmDetails method accepts FRN number', function () {
    // This test would normally mock the HTTP client
    // For now, we just test that the method accepts the parameter
    expect(fn() => Fcaapi::firmDetails('123456'))
        ->not->toThrow(\Exception::class, 'NO FCA FRN NUMBER PROVIDED');
});

test('search method requires search parameter', function () {
    expect(fn() => Fcaapi::search())
        ->toThrow(\Exception::class, 'NO SEARCH PARIMITER PROVIDED');
});

test('individualDetails method requires IRN number', function () {
    expect(fn() => Fcaapi::individualDetails())
        ->toThrow(\Exception::class, 'NO FCA IRN NUMBER PROVIDED');
});

test('all firm methods require FRN number', function () {
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
        expect(fn() => Fcaapi::$method())
            ->toThrow(\Exception::class, 'NO FCA FRN NUMBER PROVIDED');
    }
});