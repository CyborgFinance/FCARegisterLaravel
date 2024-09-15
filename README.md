# Financial Conduct Authority (FCA) API Client Library wrapper for Laravel.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cyborgfinance/fcaregisterlaravel.svg?style=flat-square)](https://packagist.org/packages/cyborgfinance/fcaregisterlaravel)
[![Total Downloads](https://img.shields.io/packagist/dt/cyborgfinance/fcaregisterlaravel.svg?style=flat-square)](https://packagist.org/packages/cyborgfinance/fcaregisterlaravel)

Financial Conduct Authority (FCA) API Client Library wrapper for Laravel.

## The Financial Services Register

The online Financial Services Register (FS Register) is a public record of financial services firms, individuals and other bodies regulated by the FCA.

The online FS Register provides an online search for firms that are or have been regulated by the FCA. It also allows users to search for businesses that are or have been registered with the FCA under the FSMA, the Money Laundering Regulations 2007, the Payment Services Regulations 2009, and the Electronic Money Regulations 2011. Access to the online FS Register is free; it is suitable for ad-hoc searches for authorised and registered firms and individuals.

### The Financial Services Register API Service

The FCA API is a new service offered by the Financial Conduct Authority, its in early stages with limited data points. You will first need to [Register an Account](https://register.fca.org.uk/Developer/s/) to get an API Key.

It is a RESTful API based on HTTPS requests and JSON responses, requiring an API username and key for authentication.

The FS Register API currently sets a maximum limit of 10 requests per 10 seconds, which is periodically subject to change.

## Installation

You can install the package via composer:

```bash
composer require cyborgfinance/fcaregisterlaravel
```

Add the following to your Environment File:

```bash
FCA_EMAIL="your@email.com"
FCA_KEY="YOUR_FCA_API_KEY"
```

OR

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Cyborgfinance\Fcaregisterlaravel\FcaregisterlaravelServiceProvider" --tag="fcaapi-config"
```

This is the contents of the published config file:

```php
return [
  'email' => env('FCA_EMAIL', 'your@email.com'), // FCA API Email Address
  'key' => env('FCA_KEY', 'YOUR_FCA_API_KEY'), // FCA API KEY
  'api_version' => '0.1', // FCA API VERSION
  'api_url' => 'https://register.fca.org.uk/services/', // FCA API URL
  'api_timeout' => 5, // FCA API TIMEOUT in seconds
];

```

## Usage

```php
namespace App\Http\Controllers;
use Cyborgfinance\Fcaregisterlaravel\Fcaapi;

class Testing extends Controller {

    public function __invoke(Request $request){

      $fcaFrnNumber = 919921; //FCA Firm Reference Number (FRN)

      $fcaApi = new Fcaapi();
      $result = $fcaApi->firmDetails($fcaFrnNumber)->json(); //Queries FCA Register

      dd($result); // Outputs Array

    }
}
```

or

```php
namespace App\Http\Controllers;
use Cyborgfinance\Fcaregisterlaravel\Fcaapi;

class Testing extends Controller {

    public function __invoke(Request $request){

      $fcaFrnNumber = 919921; //FCA Firm Reference Number (FRN)

      $result = Fcaapi::firmDetails($fcaFrnNumber)->json(); //Queries FCA Register

      dd($result); // Outputs Array

    }
}
```

Both of these examples will output:

```bash
array:4 [▼
  "Status" => "FSR-API-02-01-00"
  "ResultInfo" => array:3 [▼
    "page" => "1"
    "per_page" => "1"
    "total_count" => "1"
  ]
  "Message" => "Ok. Firm Found"
  "Data" => array:1 [▼
    0 => array:21 [▼
      "Name" => "https://register.fca.org.uk/services/V0.1/Firm/919921/Names"
      "Individuals" => "https://register.fca.org.uk/services/V0.1/Firm/919921/Individuals"
      "Requirements" => "https://register.fca.org.uk/services/V0.1/Firm/919921/Requirements"
      "Permission" => "https://register.fca.org.uk/services/V0.1/Firm/919921/Permissions"
      "Passport" => "https://register.fca.org.uk/services/V0.1/Firm/919921/Passports"
      "Regulators" => "https://register.fca.org.uk/services/V0.1/Firm/919921/Regulators"
      "Appointed Representative" => "https://register.fca.org.uk/services/V0.1/Firm/919921/AR"
      "Address" => "https://register.fca.org.uk/services/V0.1/Firm/919921/Address"
      "Waivers" => "https://register.fca.org.uk/services/V0.1/Firm/919921/Waivers"
      "Exclusions" => "https://register.fca.org.uk/services/V0.1/Firm/919921/Exclusions"
      "DisciplinaryHistory" => "https://register.fca.org.uk/services/V0.1/Firm/919921/DisciplinaryHistory"
      "System Timestamp" => "10/04/2021 15:49"
      "Exceptional Info Title" => ""
      "Exceptional Info Body" => ""
      "Status Effective Date" => "24/04/2020"
      "PSD Agent Status" => ""
      "PSD / EMD Status" => ""
      "Status" => "Authorised"
      "Business Type" => "Regulated"
      "Organisation Name" => "CYBORG FINANCE LIMITED"
      "FRN" => "919921"
    ]
  ]
]
```

## FCA Register Lookup Methods

### Company Records

```php
//Get information about a specific firm using its Firm Reference Number
$request = Fcaapi::firmDetails($fcaFrnNumber);
```

```php
//Get information about the Individuals associated with a firm using its Firm Reference Number
$request = Fcaapi::firmIndividuals($fcaFrnNumber);
```

```php
//Get information about the other names used by the firms using its Firm Reference Number
$request = Fcaapi::firmName($fcaFrnNumber);
```

```php
//Get information about the requirements associated with a specific firm using its Firm Reference Number
$request = Fcaapi::firmRequirements($fcaFrnNumber);
```

```php
//Get information about the activities and permissions associated with a specific firm using its Firm Reference Number
$request = Fcaapi::firmPermissions($fcaFrnNumber);
```

```php
//Get information about a passport details by using its Firm Reference Number
$request = Fcaapi::firmPassports($fcaFrnNumber);
```

```php
//Get information about a passport permission by using its Firm Reference Number and Country
$request = Fcaapi::firmPassportCountry($fcaFrnNumber, $country);
```

```php
//Get information about a regulator on a firm using its Firm Reference Number
$request = Fcaapi::firmRegulators($fcaFrnNumber);
```

```php
//Get information about the Appointed Representatives associated with a firm using its Firm Reference Number
$request = Fcaapi::firmAppointedRepresentatives($fcaFrnNumber);
```

```php
//Get information about a specific firm using its Firm Reference Number
$request = Fcaapi::firmAddress($fcaFrnNumber);
```

```php
//Get information about a Waiver on a firm using it's Firm Reference Number
$request = Fcaapi::firmWaivers($fcaFrnNumber);
```

```php
//Get information about an Exclusion on a firm using it's Firm Reference Number
$request = Fcaapi::firmExclusions($fcaFrnNumber);
```

```php
//Get information about a DisciplinaryHistory on a firm using it's Firm Reference Number
$request = Fcaapi::firmDisciplinaryHistory($fcaFrnNumber);
```

## Individual Records

```php
//Get information about the Individuals associated with its Individual Reference Number
$request = Fcaapi::individualDetails($fcaIrnNumber);
```

```php
//Get information about all the firms, the Individual has a control function using their Individual Reference Number
$request = Fcaapi::individualFunctions($fcaIrnNumber);
```

### Search Records

```php
//Search the FS register using this API
$request = Fcaapi::search($search);
```

```php
//Search the FS register using this API
$request = Fcaapi::searchRm();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- Cyborg Finance [GitHub](https://github.com/CyborgFinance), [Website](https://cyborg.finance) & [Twitter](https://twitter.com/cyborgfinance)
- Adam Hosker [GitHub](https://github.com/ahosker), [Website](https://hosker.info) & [Twitter](https://twitter.com/adam_hosker)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## TODO

[] Fix Config Publish
