<?php

namespace Cyborgfinance\Fcaregisterlaravel\Tests\Unit;

use Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaApiException;
use Cyborgfinance\Fcaregisterlaravel\FcaApiClient;
use PHPUnit\Framework\TestCase;

class FcaApiClientTest extends TestCase
{
    private FcaApiClient $client;

    protected function setUp(): void
    {
        $this->client = new FcaApiClient;
    }

    /** @test */
    public function it_throws_exception_for_empty_uri()
    {
        $this->expectException(FcaApiException::class);
        $this->expectExceptionMessage('NO URI Detected');

        $this->client->get('');
    }

    /** @test */
    public function it_constructs_correct_api_url_with_defaults()
    {
        $reflection = new \ReflectionClass($this->client);
        $method = $reflection->getMethod('getApiUrl');
        $method->setAccessible(true);

        $url = $method->invoke($this->client, 'Firm/123456');

        $this->assertEquals('https://register.fca.org.uk/services/V0.1/Firm/123456', $url);
    }

    /** @test */
    public function it_handles_config_values()
    {
        // Test that the method exists and can be called
        $reflection = new \ReflectionClass($this->client);
        $method = $reflection->getMethod('getApiUrl');
        $method->setAccessible(true);

        $url = $method->invoke($this->client, 'test/endpoint');

        $this->assertIsString($url);
        $this->assertStringContainsString('test/endpoint', $url);
    }
}
