<?php

namespace Cyborgfinance\Fcaregisterlaravel\Tests\Unit;

use Cyborgfinance\Fcaregisterlaravel\FcaErrorHandler;
use Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaApiException;
use PHPUnit\Framework\TestCase;

class FcaErrorHandlerTest extends TestCase
{
    /** @test */
    public function it_handles_success_codes_without_throwing_exceptions()
    {
        // Test various success codes
        $successCodes = [
            'FSR-API-01-01-00', // Login success
            'FSR-API-02-01-00', // Firm details success
            'FSR-API-02-05-00', // Firm individual success
            'FSR-API-03-01-00', // Individual success
            'FSR-API-04-01-00', // Search success
        ];

        foreach ($successCodes as $code) {
            FcaErrorHandler::handleStatusCode($code);
            $this->assertTrue(true, "Success code {$code} should not throw exception");
        }
    }

    /** @test */
    public function it_throws_exception_for_empty_status_code()
    {
        $this->expectException(FcaApiException::class);
        $this->expectExceptionMessage('NO FCA STATUS CODE');
        
        FcaErrorHandler::handleStatusCode('');
    }

    /** @test */
    public function it_throws_exception_for_login_errors()
    {
        $this->expectException(FcaApiException::class);
        $this->expectExceptionMessage('Unauthorised');
        
        FcaErrorHandler::handleStatusCode('FSR-API-01-01-11');
    }

    /** @test */
    public function it_throws_exception_for_firm_not_found_error()
    {
        $this->expectException(FcaApiException::class);
        $this->expectExceptionMessage('Firm not found');
        
        FcaErrorHandler::handleStatusCode('FSR-API-02-01-11');
    }

    /** @test */
    public function it_throws_exception_for_individual_not_found_error()
    {
        $this->expectException(FcaApiException::class);
        $this->expectExceptionMessage('Individual not found');
        
        FcaErrorHandler::handleStatusCode('FSR-API-02-05-11');
    }

    /** @test */
    public function it_throws_exception_for_bad_request_errors()
    {
        $this->expectException(FcaApiException::class);
        $this->expectExceptionMessage('Bad request: Invalid Input');
        
        FcaErrorHandler::handleStatusCode('FSR-API-02-01-21');
    }

    /** @test */
    public function it_throws_exception_for_page_not_found_errors()
    {
        $this->expectException(FcaApiException::class);
        $this->expectExceptionMessage('Page Not found');
        
        FcaErrorHandler::handleStatusCode('FSR-API-02-04-22');
    }

    /** @test */
    public function it_throws_exception_for_search_errors()
    {
        $this->expectException(FcaApiException::class);
        $this->expectExceptionMessage('No search result found');
        
        FcaErrorHandler::handleStatusCode('FSR-API-04-01-11');
    }

    /** @test */
    public function it_throws_exception_for_generic_system_errors()
    {
        $this->expectException(FcaApiException::class);
        $this->expectExceptionMessage('System Error');
        
        FcaErrorHandler::handleStatusCode('FSR-API-99-01-01');
    }

    /** @test */
    public function it_throws_exception_for_unknown_status_codes()
    {
        $this->expectException(FcaApiException::class);
        $this->expectExceptionMessage('Unknown FCA status code: FSR-API-99-99-98');
        
        FcaErrorHandler::handleStatusCode('FSR-API-99-99-98');
    }

    /** @test */
    public function it_identifies_success_codes_correctly()
    {
        $this->assertTrue(FcaErrorHandler::isSuccessCode('FSR-API-01-01-00'));
        $this->assertTrue(FcaErrorHandler::isSuccessCode('FSR-API-02-05-00'));
        $this->assertFalse(FcaErrorHandler::isSuccessCode('FSR-API-01-01-11'));
        $this->assertFalse(FcaErrorHandler::isSuccessCode('FSR-API-02-05-21'));
    }

    /** @test */
    public function it_returns_error_message_for_error_codes()
    {
        $this->assertEquals('', FcaErrorHandler::getErrorMessage('FSR-API-01-01-00'));
        $this->assertEquals('Unauthorised', FcaErrorHandler::getErrorMessage('FSR-API-01-01-11'));
        $this->assertEquals('Firm not found', FcaErrorHandler::getErrorMessage('FSR-API-02-01-11'));
        $this->assertEquals('Bad request: Invalid Input', FcaErrorHandler::getErrorMessage('FSR-API-02-01-21'));
        $this->assertEquals('System Error', FcaErrorHandler::getErrorMessage('FSR-API-99-01-01'));
    }

    /** @test */
    public function it_handles_all_error_codes_from_csv()
    {
        // Test a sampling of error codes to ensure comprehensive coverage
        $errorCodes = [
            'FSR-API-01-01-21' => 'Forbidden: API and Email key not found',
            'FSR-API-02-02-11' => 'Address not found',
            'FSR-API-02-03-11' => 'Permission not found',
            'FSR-API-02-04-11' => 'Brand Name not found',
            'FSR-API-02-06-11' => 'Firm Requirements not found',
            'FSR-API-02-07-11' => 'Passport not found',
            'FSR-API-02-08-11' => 'Passport permission not found',
            'FSR-API-02-09-11' => 'Regulators not found',
            'FSR-API-02-10-11' => 'Exclusions information not found',
            'FSR-API-02-11-11' => 'Disciplinary history information not found',
            'FSR-API-02-12-11' => 'Control Function not found',
            'FSR-API-02-13-11' => 'Investment Types not found',
            'FSR-API-02-14-11' => 'Waiver information not found',
            'FSR-API-03-01-11' => 'Individual not found',
            'FSR-API-03-02-11' => 'Individual Control function not found',
            'FSR-API-03-03-11' => 'Disciplinary history information not found',
            'FSR-API-04-01-21' => 'Bad request: Invalid Input',
            'FSR-API-99-99-99' => 'Exception: Any random error',
        ];

        foreach ($errorCodes as $code => $expectedMessage) {
            $this->assertEquals($expectedMessage, FcaErrorHandler::getErrorMessage($code));
        }
    }
}