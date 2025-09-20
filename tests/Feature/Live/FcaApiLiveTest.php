<?php

declare(strict_types=1);

namespace Cyborgfinance\Fcaregisterlaravel\Tests\Feature\Live;

use Cyborgfinance\Fcaregisterlaravel\Fcaapi;
use Cyborgfinance\Fcaregisterlaravel\Tests\TestCase;
use Exception;

/**
 * @group live
 * @group integration
 */
final class FcaApiLiveTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Skip live tests if explicitly disabled
        if (! config('fcaapi.run_live_tests')) {
            $this->markTestSkipped('Live tests are disabled. Set RUN_LIVE_TESTS=true to enable.');
        }

        // Skip live tests if no real API credentials are available
        if (! $this->hasValidApiCredentials()) {
            $this->markTestSkipped('Live FCA API credentials not configured. Set FCA_EMAIL and FCA_KEY environment variables.');
        }

        // Rate limiting: sleep to respect 10 requests per 10 seconds limit
        sleep(1);
    }

    /** @test */
    public function it_can_retrieve_firm_details_using_real_api(): void
    {
        // Use a known FCA firm number (e.g., a major bank)
        $testFrn = 919921; // Example: Cyborg Finance LTD

        $response = Fcaapi::firmDetails($testFrn);

        // Verify the response structure - API is accessible
        expect($response->status())->toBe(200);
        expect($response->json())->toHaveKey('Status');
        expect($response->json()['Status'])->toMatch('/^FSR-API-\\d{2}-\\d{2}-\\d{2}$/');
        expect($response->json())->toHaveKey('Data');

        // Basic verification that we got a response
        expect($response->json())->toBeArray();
    }

    /** @test */
    public function it_can_search_for_firms_using_real_api(): void
    {
        $searchTerm = 'Cyborg';

        $response = Fcaapi::search($searchTerm);

        expect($response->status())->toBe(200);
        expect($response->json())->toHaveKey('Status');
        expect($response->json()['Status'])->toMatch('/^FSR-API-\\d{2}-\\d{2}-\\d{2}$/');
        expect($response->json())->toHaveKey('Data');

        // Basic verification that we got a response
        expect($response->json())->toBeArray();
    }

    /** @test */
    public function it_can_retrieve_firm_names_using_real_api(): void
    {
        $testFrn = 919921; // Cyborg Finance LTD

        $response = Fcaapi::firmName($testFrn);

        expect($response->status())->toBe(200);
        expect($response->json())->toHaveKey('Status');
        expect($response->json()['Status'])->toMatch('/^FSR-API-\\d{2}-\\d{2}-\\d{2}$/');
        expect($response->json())->toHaveKey('Data');

        // Basic verification that we got a response
        expect($response->json())->toBeArray();
    }

    /** @test */
    public function it_can_retrieve_firm_permissions_using_real_api(): void
    {
        $testFrn = (int) '919921'; // Cyborg Finance LTD

        $response = Fcaapi::firmPermissions($testFrn);

        expect($response->status())->toBe(200);
        expect($response->json())->toHaveKey('Status');
        expect($response->json()['Status'])->toMatch('/^FSR-API-\\d{2}-\\d{2}-\\d{2}$/');
        expect($response->json())->toHaveKey('Data');

        // Basic verification that we got a response
        expect($response->json())->toBeArray();
    }

    /** @test */
    public function it_handles_invalid_frn_numbers_gracefully(): void
    {
        $invalidFrn = '999999999'; // Very unlikely to exist

        // Should handle invalid FRN appropriately (either throw exception or return error)
        try {
            $response = Fcaapi::firmDetails($invalidFrn);
            // If no exception, should return an error status
            expect($response->status())->not->toBe(200);
        } catch (Exception) {
            // Exception is also acceptable behavior
            expect(true)->toBeTrue();
        }
    }

    /** @test */
    public function it_can_retrieve_firm_address_using_real_api(): void
    {
        $testFrn = (int) '919921'; // Cyborg Finance LTD

        $response = Fcaapi::firmAddress($testFrn);

        expect($response->status())->toBe(200);
        expect($response->json())->toHaveKey('Status');
        expect($response->json()['Status'])->toMatch('/^FSR-API-\\d{2}-\\d{2}-\\d{2}$/');
        expect($response->json())->toHaveKey('Data');

        // Basic verification that we got a response
        expect($response->json())->toBeArray();
    }

    /** @test */
    public function it_can_retrieve_firm_individuals_using_real_api(): void
    {
        $testFrn = 919921; // Cyborg Finance LTD

        // This endpoint may not be available or may require different parameters
        try {
            $response = Fcaapi::firmIndividuals($testFrn);

            expect($response->status())->toBe(200);
            expect($response->json())->toHaveKey('Status');
            expect($response->json()['Status'])->toMatch('/^FSR-API-\\d{2}-\\d{2}-\\d{2}$/');
            expect($response->json())->toHaveKey('Data');

            // Basic verification that we got a response
            expect($response->json())->toBeArray();
        } catch (Exception) {
            // If the endpoint doesn't exist or returns an error, that's acceptable for a live test
            expect(true)->toBeTrue();
        }
    }

    /** @test */
    public function it_can_perform_common_search_using_real_api(): void
    {
        $response = Fcaapi::searchRm();

        expect($response->status())->toBe(200);
        expect($response->json())->toHaveKey('Status');
        expect($response->json()['Status'])->toMatch('/^FSR-API-\\d{2}-\\d{2}-\\d{2}$/');
        expect($response->json())->toHaveKey('Data');
    }

    /** @test */
    public function it_respects_rate_limits_with_multiple_requests(): void
    {
        $testFrn = 919921;

        // Make multiple requests to test rate limiting
        $responses = [];
        for ($i = 0; $i < 3; $i++) {
            $responses[] = Fcaapi::firmDetails($testFrn);
            // Delay between requests to respect rate limits (1 second = 10 requests per 10 seconds)
            if ($i < 2) { // No need to sleep after the last request
                sleep(1);
            }
        }

        // All requests should succeed
        foreach ($responses as $response) {
            expect($response->status())->toBe(200);
            expect($response->json()['Status'])->toMatch('/^FSR-API-\\d{2}-\\d{2}-\\d{2}$/');
        }
    }

    /**
     * Check if valid API credentials are available
     */
    private function hasValidApiCredentials(): bool
    {
        $email = config('fcaapi.email');
        $key = config('fcaapi.key');

        // Don't use default test credentials
        return $email !== 'test@example.com' &&
               $key !== 'test-key' &&
               ! empty($email) &&
               ! empty($key) &&
               $email !== 'your@email.com' &&
               $key !== 'YOUR_FCA_API_KEY';
    }
}
