<?php

namespace Cyborgfinance\Fcaregisterlaravel;

use Illuminate\Support\Facades\Http;

class Fcaapi
{

  //Firm Details
  public static function firmDetails($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber);
  }
  public static function firmIndividuals($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/Individuals');
  }
  public static function firmName($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/Names');
  }
  public static function firmRequirements($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/Requirements');
  }
  public static function firmPermissions($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/Permissions');
  }
  public static function firmPassports($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/Passports');
  }
  public static function firmPassportCountry($fcaFrnNumber = NULL, $country = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    if(!$country){abort(403, "NO FCA COUNTRY PROVIDED");}
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/Passports/'.$country.'/Permission');
  }
  public static function firmRegulators($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/Regulators');
  }
  public static function firmAppointedRepresentatives($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/AR');
  }
  public static function firmAddress($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/Address');
  }
  public static function firmWaivers($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/Waivers');
  }
  //Exclusions
  public static function firmExclusions($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/Exclusions');
  }
  //DisciplinaryHistory
  public static function firmDisciplinaryHistory($fcaFrnNumber = NULL){
    self::validateFcaFrnNumber($fcaFrnNumber);
    return self::fcaGet('Firm/'.$fcaFrnNumber.'/DisciplinaryHistory');
  }
  //-----------------
  public static function individualDetails($fcaIrnNumber = NULL){
    if(!$fcaIrnNumber){abort(403, "NO FCA IRN NUMBER PROVIDED");}
    return self::fcaGet('Individuals/'.$fcaIrnNumber);
  }
  public static function individualFunctions($fcaIrnNumber = NULL){
    if(!$fcaIrnNumber){abort(403, "NO FCA IRN NUMBER PROVIDED");}
    return self::fcaGet('Individuals/'.$fcaIrnNumber.'/CF');
  }
  //-----------
  public static function search($search = NULL){
    if(!$search){abort(403, "NO SEARCH PARIMITER PROVIDED");}
    return self::fcaGet('Search?q='.$search.'&per_page=10');
  }
  public static function searchRm(){
    return self::fcaGet('CommonSearch?q=RM');
  }

  private static function fcaGet($uri = NULL){

    //BASIC ERROR DETECTION
    if(!$uri){abort(403, "NO URI Detetcted");}

    //Generate FCA API Lookup URL
    $apiUrl = config('fcaapi.api_url', 'https://register.fca.org.uk/services/').'V'.config('fcaapi.api_version', '0.1').'/'.$uri;

    //Query FCA API
    $response = Http::withHeaders([
      'X-Auth-Email' => config('fcaapi.email'),
      'X-Auth-Key' => config('fcaapi.key'),
      'Content-Type' => 'application/json'
    ])
    ->timeout(config('fcaapi.api_timeout', 5))
    ->retry(3, 100)
    ->get($apiUrl);

    //Error Handleing
    if($response['Status']){
      self::statusCodes($response['Status']);
    }
    if($response->failed()){$response->throw();}
    if($response->clientError()){$response->throw();}
    if($response->serverError()){$response->throw();}

    //outputs
    //$response->body() : string;
    //$response->json() : array|mixed;
    //$response->collect() : Illuminate\Support\Collection;

    return $response;
  }

  private static function validateFcaFrnNumber($fcaFrnNumber){
    if(!$fcaFrnNumber){abort(403, "NO FCA FRN NUMBER PROVIDED");}
  }

  private static function statusCodes($code){

    if(!$code){abort(403, "NO FCA STATUS CODE");}

    switch ($code) {
        //Success Codes
        case 'FSR-API-02-05-00': break;
        //Error Codes
        case 'FSR-API-02-05-11': abort(403, "Bad Request : Invalid Input"); break;
        case 'FSR-API-01-01-11': abort(403, 'Unauthorised: Please include a valid API key and Email address'); break;
        //--firmIndividuals
        case 'FSR-API-02-05-21': abort(403, 'ERROR : Individual Not Found'); break;
        //--
    }
    return TRUE;
  }



}
