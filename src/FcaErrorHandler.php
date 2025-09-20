<?php

declare(strict_types=1);

namespace Cyborgfinance\Fcaregisterlaravel;

use Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaApiException;

final class FcaErrorHandler
{
    /**
     * Handle FCA API status codes and throw appropriate exceptions
     *
     * @param  string  $code  The FCA status code
     *
     * @throws FcaApiException When an error code is encountered
     */
    public static function handleStatusCode(string $code): void
    {
        if ($code === '' || $code === '0') {
            throw new FcaApiException('NO FCA STATUS CODE');
        }

        switch ($code) {
            // Success Codes - no exception thrown
            case 'FSR-API-01-01-00': // Login success
            case 'FSR-API-02-01-00': // Firm details success
            case 'FSR-API-02-02-00': // Firm address success
            case 'FSR-API-02-03-00': // Firm permission success
            case 'FSR-API-02-04-00': // Firm names success
            case 'FSR-API-02-05-00': // Firm individual success
            case 'FSR-API-02-06-00': // Firm requirement success
            case 'FSR-API-02-07-00': // Firm passport success
            case 'FSR-API-02-08-00': // Firm passport permission success
            case 'FSR-API-02-09-00': // Firm regulator success
            case 'FSR-API-02-10-00': // Firm exclusion success
            case 'FSR-API-02-11-00': // Firm disciplinary history success
            case 'FSR-API-02-12-00': // Firm control function success
            case 'FSR-API-02-13-00': // Firm requirements investment types success
            case 'FSR-API-02-14-00': // Firm waiver success
            case 'FSR-API-03-01-00': // Individual success
            case 'FSR-API-03-02-00': // Individual CF success
            case 'FSR-API-03-03-00': // Individual disciplinary history success
            case 'FSR-API-04-01-00': // Search success
            case 'FSR-API-06-04-00': // Ok. Regulated market information found
                break;

                // Login Errors
            case 'FSR-API-01-01-11':
                throw new FcaApiException('Unauthorised');
            case 'FSR-API-01-01-21':
                throw new FcaApiException('Forbidden: API and Email key not found');
                // Firm Detail Errors
            case 'FSR-API-02-01-11':
                throw new FcaApiException('Firm not found');
            case 'FSR-API-02-01-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Firm Names Errors
            case 'FSR-API-02-04-11':
                throw new FcaApiException('Brand Name not found');
            case 'FSR-API-02-04-21':
                throw new FcaApiException('Bad request: Invalid Input');
            case 'FSR-API-02-04-22':
                throw new FcaApiException('Page Not found');
                // Firm Address Errors
            case 'FSR-API-02-02-11':
                throw new FcaApiException('Address not found');
            case 'FSR-API-02-02-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Firm Control Function Errors
            case 'FSR-API-02-12-11':
                throw new FcaApiException('Control Function not found');
            case 'FSR-API-02-12-21':
                throw new FcaApiException('Bad request: Invalid Input');
            case 'FSR-API-02-12-22':
                throw new FcaApiException('Page Not found');
                // Firm Individual Errors
            case 'FSR-API-02-05-11':
                throw new FcaApiException('Individual not found');
            case 'FSR-API-02-05-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Firm Permission Errors
            case 'FSR-API-02-03-11':
                throw new FcaApiException('Permission not found');
            case 'FSR-API-02-03-21':
                throw new FcaApiException('Bad request: Invalid Input');
            case 'FSR-API-02-03-31':
                throw new FcaApiException('Invalid parameter');
                // Firm Requirement Errors
            case 'FSR-API-02-06-11':
                throw new FcaApiException('Firm Requirements not found');
            case 'FSR-API-02-06-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Firm Requirements Investment Types Errors
            case 'FSR-API-02-13-11':
                throw new FcaApiException('Investment Types not found');
            case 'FSR-API-02-13-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Firm Regulator Errors
            case 'FSR-API-02-09-11':
                throw new FcaApiException('Regulators not found');
            case 'FSR-API-02-09-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Firm Passport Errors
            case 'FSR-API-02-07-11':
                throw new FcaApiException('Passport not found');
            case 'FSR-API-02-07-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Firm Passport Permission Errors
            case 'FSR-API-02-08-11':
                throw new FcaApiException('Passport permission not found');
            case 'FSR-API-02-08-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Firm Waiver Errors
            case 'FSR-API-02-14-11':
                throw new FcaApiException('Waiver information not found');
            case 'FSR-API-02-14-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Firm Exclusion Errors
            case 'FSR-API-02-10-11':
                throw new FcaApiException('Exclusions information not found');
            case 'FSR-API-02-10-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Firm Disciplinary History Errors
            case 'FSR-API-02-11-11':
                throw new FcaApiException('Disciplinary history information not found');
            case 'FSR-API-02-11-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Individual Errors
            case 'FSR-API-03-01-11':
                throw new FcaApiException('Individual not found');
            case 'FSR-API-03-01-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Individual Control Function Errors
            case 'FSR-API-03-02-11':
                throw new FcaApiException('Individual Control function not found');
            case 'FSR-API-03-02-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Individual Disciplinary History Errors
            case 'FSR-API-03-03-11':
                throw new FcaApiException('Disciplinary history information not found');
            case 'FSR-API-03-03-21':
                throw new FcaApiException('Bad request: Invalid Input');
            case 'FSR-API-03-03-22':
                throw new FcaApiException('Page not found');
                // Search Errors
            case 'FSR-API-04-01-11':
                throw new FcaApiException('No search result found');
            case 'FSR-API-04-01-21':
                throw new FcaApiException('Bad request: Invalid Input');
                // Generic Errors
            case 'FSR-API-99-01-01':
                throw new FcaApiException('System Error');
            case 'FSR-API-99-99-99':
                throw new FcaApiException('Exception: Any random error');
            default:
                throw new FcaApiException("Unknown FCA status code: {$code}");
        }
    }

    /**
     * Check if a status code represents a successful response
     *
     * @param  string  $code  The FCA status code
     * @return bool True if the code is a success code
     */
    public static function isSuccessCode(string $code): bool
    {
        return str_ends_with($code, '-00');
    }

    /**
     * Get the error message for a given status code
     *
     * @param  string  $code  The FCA status code
     * @return string The error message, or empty string for success codes
     */
    public static function getErrorMessage(string $code): string
    {
        try {
            self::handleStatusCode($code);

            return ''; // Success codes return empty string
        } catch (FcaApiException $e) {
            return $e->getMessage();
        }
    }
}
