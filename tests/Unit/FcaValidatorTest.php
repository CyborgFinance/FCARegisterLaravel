<?php

namespace Cyborgfinance\Fcaregisterlaravel\Tests\Unit;

use Cyborgfinance\Fcaregisterlaravel\FcaValidator;
use Cyborgfinance\Fcaregisterlaravel\Exceptions\FcaValidationException;
use PHPUnit\Framework\TestCase;

class FcaValidatorTest extends TestCase
{
    /** @test */
    public function it_validates_positive_frn_numbers()
    {
        // Should not throw exception for valid FRN numbers
        FcaValidator::validateFrnNumber(1);
        FcaValidator::validateFrnNumber(123456);
        $this->assertTrue(true);
    }

    /** @test */
    public function it_rejects_zero_frn_number()
    {
        $this->expectException(FcaValidationException::class);
        $this->expectExceptionMessage('FCA FRN NUMBER MUST BE A POSITIVE INTEGER');
        
        FcaValidator::validateFrnNumber(0);
    }

    /** @test */
    public function it_rejects_negative_frn_number()
    {
        $this->expectException(FcaValidationException::class);
        $this->expectExceptionMessage('FCA FRN NUMBER MUST BE A POSITIVE INTEGER');
        
        FcaValidator::validateFrnNumber(-1);
    }

    /** @test */
    public function it_validates_irn_numbers()
    {
        // Should not throw exception for valid IRN numbers
        FcaValidator::validateIrnNumber('ABC123');
        FcaValidator::validateIrnNumber('XYZ789');
        $this->assertTrue(true);
    }

    /** @test */
    public function it_rejects_empty_irn_number()
    {
        $this->expectException(FcaValidationException::class);
        $this->expectExceptionMessage('NO FCA IRN NUMBER PROVIDED');
        
        FcaValidator::validateIrnNumber('');
    }

    /** @test */
    public function it_rejects_whitespace_only_irn_number()
    {
        $this->expectException(FcaValidationException::class);
        $this->expectExceptionMessage('NO FCA IRN NUMBER PROVIDED');
        
        FcaValidator::validateIrnNumber('   ');
    }

    /** @test */
    public function it_validates_country_parameter()
    {
        // Should not throw exception for valid country
        FcaValidator::validateCountry('GB');
        FcaValidator::validateCountry('US');
        $this->assertTrue(true);
    }

    /** @test */
    public function it_rejects_empty_country()
    {
        $this->expectException(FcaValidationException::class);
        $this->expectExceptionMessage('NO FCA COUNTRY PROVIDED');
        
        FcaValidator::validateCountry('');
    }

    /** @test */
    public function it_validates_search_parameter()
    {
        // Should not throw exception for valid search
        FcaValidator::validateSearch('test search');
        FcaValidator::validateSearch('company name');
        $this->assertTrue(true);
    }

    /** @test */
    public function it_rejects_empty_search()
    {
        $this->expectException(FcaValidationException::class);
        $this->expectExceptionMessage('NO SEARCH PARAMETER PROVIDED');
        
        FcaValidator::validateSearch('');
    }

    /** @test */
    public function it_validates_req_ref_parameter()
    {
        // Should not throw exception for valid requirement reference
        FcaValidator::validateReqRef('REQ123');
        FcaValidator::validateReqRef('REF001');
        $this->assertTrue(true);
    }

    /** @test */
    public function it_rejects_empty_req_ref()
    {
        $this->expectException(FcaValidationException::class);
        $this->expectExceptionMessage('NO REQUIREMENT REFERENCE PROVIDED');
        
        FcaValidator::validateReqRef('');
    }

    /** @test */
    public function it_rejects_whitespace_only_req_ref()
    {
        $this->expectException(FcaValidationException::class);
        $this->expectExceptionMessage('NO REQUIREMENT REFERENCE PROVIDED');
        
        FcaValidator::validateReqRef('   ');
    }

    /** @test */
    public function it_validates_search_type_parameter()
    {
        // Should not throw exception for valid search types
        FcaValidator::validateSearchType('firm');
        FcaValidator::validateSearchType('individual');
        FcaValidator::validateSearchType('fund');
        FcaValidator::validateSearchType('FIRM'); // Case insensitive
        $this->assertTrue(true);
    }

    /** @test */
    public function it_rejects_invalid_search_type()
    {
        $this->expectException(FcaValidationException::class);
        $this->expectExceptionMessage('INVALID SEARCH TYPE. MUST BE ONE OF: firm, individual, fund');
        
        FcaValidator::validateSearchType('invalid_type');
    }
}