<?php

namespace Cyborgfinance\Fcaregisterlaravel;

use Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException;
use Illuminate\Http\Client\Response;

class Fcaapi
{
    private static ?FcaApiClient $client = null;

    private static ?FcaValidator $validator = null;

    /**
     * Get firm details by FRN (Firm Reference Number)
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmDetails(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, '');
    }

    /**
     * Get individuals associated with a firm
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmIndividuals(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'Individuals');
    }

    /**
     * Get firm names and trading names
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmName(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'Names');
    }

    /**
     * Get firm requirements and conditions
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmRequirements(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'Requirements');
    }

    /**
     * Get firm requirements investment types
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @param  string  $reqRef  The requirement reference
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number or requirement reference is invalid
     */
    public static function requirementsInvestmentTypes(int $fcaFrnNumber, string $reqRef): Response
    {
        self::getValidator()->validateFrnNumber($fcaFrnNumber);
        self::getValidator()->validateReqRef($reqRef);

        return self::getClient()->get('Firm/'.$fcaFrnNumber.'/Requirements/'.$reqRef.'/InvestmentTypes');
    }

    /**
     * Get firm permissions and regulated activities
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmPermissions(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'Permissions');
    }

    /**
     * Get firm passports and passporting permissions
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmPassports(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'Passports');
    }

    /**
     * Get firm passport permissions for a specific country
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @param  string  $country  The country code
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid or country is not provided
     */
    public static function firmPassportCountry(int $fcaFrnNumber, string $country): Response
    {
        self::getValidator()->validateFrnNumber($fcaFrnNumber);
        self::getValidator()->validateCountry($country);

        return self::getClient()->get('Firm/'.$fcaFrnNumber.'/Passports/'.$country.'/Permission');
    }

    /**
     * Get firm regulators information
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmRegulators(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'Regulators');
    }

    /**
     * Get firm appointed representatives
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmAppointedRepresentatives(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'AR');
    }

    /**
     * Get firm address details
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmAddress(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'Address');
    }

    /**
     * Get firm waivers and variations
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmWaivers(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'Waivers');
    }

    /**
     * Get firm exclusions information
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmExclusions(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'Exclusions');
    }

    /**
     * Get firm disciplinary history
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmDisciplinaryHistory(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'DisciplinaryHistory');
    }

    /**
     * Get firm controlled functions
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function firmControlledFunctions(int $fcaFrnNumber): Response
    {
        return self::firmEndpoint($fcaFrnNumber, 'CF');
    }

    // -----------------
    /**
     * Get individual details by IRN (Individual Reference Number)
     *
     * @param  string  $fcaIrnNumber  The FCA Individual Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When IRN number is invalid
     */
    public static function individualDetails(string $fcaIrnNumber): Response
    {
        self::getValidator()->validateIrnNumber($fcaIrnNumber);

        return self::getClient()->get('Individuals/'.$fcaIrnNumber);
    }

    /**
     * Get individual controlled functions and roles
     *
     * @param  string  $fcaIrnNumber  The FCA Individual Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When IRN number is invalid
     */
    public static function individualFunctions(string $fcaIrnNumber): Response
    {
        self::getValidator()->validateIrnNumber($fcaIrnNumber);

        return self::getClient()->get('Individuals/'.$fcaIrnNumber.'/CF');
    }

    /**
     * Get individual disciplinary history
     *
     * @param  string  $fcaIrnNumber  The FCA Individual Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When IRN number is invalid
     */
    public static function individualDisciplinaryHistory(string $fcaIrnNumber): Response
    {
        self::getValidator()->validateIrnNumber($fcaIrnNumber);

        return self::getClient()->get('Individuals/'.$fcaIrnNumber.'/DisciplinaryHistory');
    }

    // -----------
    /**
     * Search FCA register for firms and individuals
     *
     * @param  string  $search  The search term
     * @param  string  $type  The search type (firm, individual, or fund)
     * @param  int  $perPage  Number of results per page
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When search parameter is not provided
     */
    public static function search(string $search, string $type = 'firm', int $perPage = 10): Response
    {
        self::getValidator()->validateSearch($search);
        self::getValidator()->validateSearchType($type);

        return self::getClient()->get('Search?q='.$search.'&type='.$type.'&per_page='.$perPage);
    }

    /**
     * Search for firms with specific permissions
     *
     * @param  string  $query  The search query
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When query parameter is not provided
     */
    public static function searchRm(string $query = 'RM'): Response
    {
        self::getValidator()->validateSearch($query);

        return self::getClient()->get('CommonSearch?q='.$query);
    }

    /**
     * Get product details by firm reference number
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function productDetails(int $fcaFrnNumber): Response
    {
        self::getValidator()->validateFrnNumber($fcaFrnNumber);

        return self::getClient()->get('Products/'.$fcaFrnNumber);
    }

    /**
     * Get product other names by firm reference number
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function productOtherNames(int $fcaFrnNumber): Response
    {
        self::getValidator()->validateFrnNumber($fcaFrnNumber);

        return self::getClient()->get('Products/'.$fcaFrnNumber.'/OtherNames');
    }

    /**
     * Get product subfunds by firm reference number
     *
     * @param  int  $fcaFrnNumber  The FCA Firm Reference Number
     * @return Response Laravel HTTP Response object
     *
     * @throws FcaValidationException When FRN number is invalid
     */
    public static function productSubfunds(int $fcaFrnNumber): Response
    {
        self::getValidator()->validateFrnNumber($fcaFrnNumber);

        return self::getClient()->get('Products/'.$fcaFrnNumber.'/Subfunds');
    }

    private static function firmEndpoint(int $fcaFrnNumber, string $endpoint): Response
    {
        self::getValidator()->validateFrnNumber($fcaFrnNumber);
        $uri = 'Firm/'.$fcaFrnNumber;
        if ($endpoint) {
            $uri .= '/'.$endpoint;
        }

        return self::getClient()->get($uri);
    }

    private static function getClient(): FcaApiClient
    {
        if (self::$client === null) {
            self::$client = new FcaApiClient;
        }

        return self::$client;
    }

    private static function getValidator(): FcaValidator
    {
        if (self::$validator === null) {
            self::$validator = new FcaValidator;
        }

        return self::$validator;
    }
}
