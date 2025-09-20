<?php

namespace Cyborgfinance\Fcaregisterlaravel;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException;
use Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaApiException;

class Fcaapi
{
    private const DEFAULT_API_URL = 'https://register.fca.org.uk/services/';
    private const DEFAULT_API_VERSION = '0.1';
    private const DEFAULT_TIMEOUT = 5;
    private const DEFAULT_RETRY_ATTEMPTS = 3;
    private const DEFAULT_RETRY_DELAY = 100;

  /**
   * Get firm details by FRN (Firm Reference Number)
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmDetails(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, '');
  }

  /**
   * Get individuals associated with a firm
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmIndividuals(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, 'Individuals');
  }

  /**
   * Get firm names and trading names
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmName(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, 'Names');
  }

  /**
   * Get firm requirements and conditions
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmRequirements(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, 'Requirements');
  }

  /**
   * Get firm permissions and regulated activities
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmPermissions(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, 'Permissions');
  }

  /**
   * Get firm passports and passporting permissions
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmPassports(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, 'Passports');
  }

  /**
   * Get firm passport permissions for a specific country
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @param string $country The country code
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid or country is not provided
   * @throws FcaApiException When API request fails
   */
  public static function firmPassportCountry(int $fcaFrnNumber, string $country): Response
  {
    self::validateFrnNumber($fcaFrnNumber);
    if (!$country) {
      throw new FcaValidationException("NO FCA COUNTRY PROVIDED");
    }
    return self::fcaGet('Firm/' . $fcaFrnNumber . '/Passports/' . $country . '/Permission');
  }

  /**
   * Get firm regulators information
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmRegulators(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, 'Regulators');
  }

  /**
   * Get firm appointed representatives
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmAppointedRepresentatives(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, 'AR');
  }

  /**
   * Get firm address details
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmAddress(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, 'Address');
  }

  /**
   * Get firm waivers and variations
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmWaivers(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, 'Waivers');
  }

  /**
   * Get firm exclusions information
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmExclusions(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, 'Exclusions');
  }

  /**
   * Get firm disciplinary history
   * 
   * @param int $fcaFrnNumber The FCA Firm Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When FRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function firmDisciplinaryHistory(int $fcaFrnNumber): Response
  {
    return self::firmEndpoint($fcaFrnNumber, 'DisciplinaryHistory');
  }
  //-----------------
  /**
   * Get individual details by IRN (Individual Reference Number)
   * 
   * @param string $fcaIrnNumber The FCA Individual Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When IRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function individualDetails(string $fcaIrnNumber): Response
  {
    self::validateIrnNumber($fcaIrnNumber);
    return self::fcaGet('Individuals/' . $fcaIrnNumber);
  }

  /**
   * Get individual controlled functions and roles
   * 
   * @param string $fcaIrnNumber The FCA Individual Reference Number
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When IRN number is invalid
   * @throws FcaApiException When API request fails
   */
  public static function individualFunctions(string $fcaIrnNumber): Response
  {
    self::validateIrnNumber($fcaIrnNumber);
    return self::fcaGet('Individuals/' . $fcaIrnNumber . '/CF');
  }

  //-----------
  /**
   * Search FCA register for firms and individuals
   * 
   * @param string $search The search term
   * @return Response Laravel HTTP Response object
   * @throws FcaValidationException When search parameter is not provided
   * @throws FcaApiException When API request fails
   */
  public static function search(string $search): Response
  {
    if (!$search) {
      throw new FcaValidationException("NO SEARCH PARAMETER PROVIDED");
    }
    return self::fcaGet('Search?q=' . $search . '&per_page=10');
  }

  /**
   * Search for firms with RM (Restricted Mortgage) permissions
   * 
   * @return Response Laravel HTTP Response object
   * @throws FcaApiException When API request fails
   */
  public static function searchRm(): Response
  {
    return self::fcaGet('CommonSearch?q=RM');
  }

  private static function fcaGet(string $uri): Response
  {
    if (!$uri) {
      throw new FcaValidationException("NO URI Detected");
    }

    $apiUrl = self::getApiUrl($uri);

    $response = Http::withHeaders([
      'X-Auth-Email' => config('fcaapi.email'),
      'X-Auth-Key' => config('fcaapi.key'),
      'Content-Type' => 'application/json'
    ])
    ->timeout(config('fcaapi.api_timeout', self::DEFAULT_TIMEOUT))
    ->retry(self::DEFAULT_RETRY_ATTEMPTS, self::DEFAULT_RETRY_DELAY)
    ->get($apiUrl);

    self::handleApiResponse($response);

    return $response;
  }

  private static function validateFrnNumber(int $fcaFrnNumber): void
  {
    if ($fcaFrnNumber <= 0) {
      throw new FcaValidationException("FCA FRN NUMBER MUST BE A POSITIVE INTEGER");
    }
  }

  private static function validateIrnNumber(string $fcaIrnNumber): void
  {
    if (empty(trim($fcaIrnNumber))) {
      throw new FcaValidationException("NO FCA IRN NUMBER PROVIDED");
    }
  }

  private static function firmEndpoint(int $fcaFrnNumber, string $endpoint): Response
  {
    self::validateFrnNumber($fcaFrnNumber);
    $uri = 'Firm/' . $fcaFrnNumber;
    if ($endpoint) {
      $uri .= '/' . $endpoint;
    }
    return self::fcaGet($uri);
  }

  private static function getApiUrl(string $uri): string
  {
    $baseUrl = config('fcaapi.api_url', self::DEFAULT_API_URL);
    $version = config('fcaapi.api_version', self::DEFAULT_API_VERSION);
    return $baseUrl . 'V' . $version . '/' . $uri;
  }

  private static function handleApiResponse(Response $response): void
  {
    if (isset($response['Status'])) {
      self::handleStatusCodes($response['Status']);
    }

    if ($response->failed()) {
      $response->throw();
    }
  }

  private static function handleStatusCodes(string $code): void
  {
    if (!$code) {
      throw new FcaApiException("NO FCA STATUS CODE");
    }

    switch ($code) {
      //Success Codes
      case 'FSR-API-02-05-00':
        break;
      //Error Codes
      case 'FSR-API-02-05-11':
        throw new FcaApiException("Bad Request : Invalid Input");
      case 'FSR-API-01-01-11':
        throw new FcaApiException('Unauthorised: Please include a valid API key and Email address');
      //--firmIndividuals
      case 'FSR-API-02-05-21':
        throw new FcaApiException('ERROR : Individual Not Found');
      //--
    }
  }



}
