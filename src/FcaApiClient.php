<?php

namespace Cyborgfinance\Fcaregisterlaravel;

use Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaApiException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class FcaApiClient
{
    private const DEFAULT_API_URL = 'https://register.fca.org.uk/services/';

    private const DEFAULT_API_VERSION = '0.1';

    private const DEFAULT_TIMEOUT = 5;

    private const DEFAULT_RETRY_ATTEMPTS = 3;

    private const DEFAULT_RETRY_DELAY = 100;

    public function get(string $uri): Response
    {
        if (! $uri) {
            throw new FcaApiException('NO URI Detected');
        }

        $apiUrl = $this->getApiUrl($uri);

        $response = Http::withHeaders([
            'X-Auth-Email' => $this->getConfig('fcaapi.email'),
            'X-Auth-Key' => $this->getConfig('fcaapi.key'),
            'Content-Type' => 'application/json',
        ])
            ->timeout($this->getConfig('fcaapi.api_timeout', self::DEFAULT_TIMEOUT))
            ->retry(self::DEFAULT_RETRY_ATTEMPTS, self::DEFAULT_RETRY_DELAY)
            ->get($apiUrl);

        $this->handleApiResponse($response);

        return $response;
    }

    private function getApiUrl(string $uri): string
    {
        $baseUrl = $this->getConfig('fcaapi.api_url', self::DEFAULT_API_URL);
        $version = $this->getConfig('fcaapi.api_version', self::DEFAULT_API_VERSION);

        return $baseUrl.'V'.$version.'/'.$uri;
    }

    private function getConfig(string $key, $default = null)
    {
        try {
            if (function_exists('config')) {
                return config($key, $default);
            }
        } catch (\Exception $e) {
            // Ignore config errors in unit tests
        }

        return $default;
    }

    private function handleApiResponse(Response $response): void
    {
        if (isset($response['Status'])) {
            FcaErrorHandler::handleStatusCode($response['Status']);
        }

        if ($response->failed()) {
            $response->throw();
        }
    }
}
