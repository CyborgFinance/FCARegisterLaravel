<?php

use Cyborgfinance\Fcaregisterlaravel\Tests\TestCase;
use Cyborgfinance\Fcaregisterlaravel\Fcaapi;
use Illuminate\Support\Facades\Http;

test('Fcaapi integrates with Laravel HTTP client', function () {
    // Mock the HTTP client
    Http::fake([
        '*' => Http::response(['Status' => 'FSR-API-02-05-00', 'Data' => []], 200),
    ]);
    
    $response = Fcaapi::firmDetails('123456');
    
    expect($response->status())->toBe(200);
    expect($response->json())->toHaveKey('Data');
});

test('Fcaapi handles API errors gracefully', function () {
    Http::fake([
        '*' => Http::response(['Status' => 'FSR-API-01-01-11'], 401),
    ]);
    
    expect(fn() => Fcaapi::firmDetails('123456'))
        ->toThrow(\Exception::class);
});

test('Fcaapi uses correct API endpoint configuration', function () {
    Http::fake([
        'https://custom.api.com/V0.2/Firm/123456' => Http::response(['Status' => 'FSR-API-02-05-00', 'Data' => []], 200),
    ]);
    
    config([
        'fcaapi.api_url' => 'https://custom.api.com/',
        'fcaapi.api_version' => '0.2'
    ]);
    
    $response = Fcaapi::firmDetails('123456');
    
    expect($response->status())->toBe(200);
});

test('Fcaapi search functionality works', function () {
    Http::fake([
        '*' => Http::response(['Status' => 'FSR-API-02-05-00', 'Data' => ['results' => []]], 200),
    ]);
    
    $response = Fcaapi::search('test search');
    
    expect($response->status())->toBe(200);
    expect($response->json())->toHaveKey('Data');
});
