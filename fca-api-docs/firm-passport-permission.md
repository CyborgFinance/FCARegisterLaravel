# Home

Firm Passport Permission API

  

DETAILS

#### Get information about a passport permission by using its Firm Reference Number and Country

  

GET End Point URL

/V0.1/Firm/{FRN}/Passports/{Country}/Permission

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/155595/Passports/Australia/Permission/](https://register.fca.org.uk/services/V0.1/Firm/155595/Passports/Australia/Permission/)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{    
    "Status": "FSR-API-02-08-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "3",
        "total\_count": "1"
    },
    "Message": "Ok. Passport permission found",
    "Data": \[
        {
            "Permissions": \[
                {
                    "Name": "A(1) Reception and transmission of orders in relation to one or more financial instruments",
                    "InvestmentTypes": \[
                        "C(1) Transferable securities",
                        "C(2) Money-market instruments",
                        "C(3) Units in collective investment undertakings",
                        "C(4) Derivatives in Securities, etc"
                    \]
                },
                {
                    "Name": "A(3) Dealing on own account",
                    "InvestmentTypes": \[
                        "C(1) Transferable securities",
                        "C(2) Money-market instruments",
                        "C(3) Units in collective investment undertakings",
                        "C(4) Derivatives in Securities, etc"
                    \]
                },
                {
                    "Name": "A(7) Placing of financial instruments without a firm commitment basis",
                    "InvestmentTypes": \[
                        "C(1) Transferable securities",
                        "C(2) Money-market instruments",
                        "C(3) Units in collective investment undertakings",
                        "C(4) Derivatives in Securities, etc"
                    \]
                },
                {
                    "Name": "B(4) Foreign exchange services where these are connected to the provision of investment services",
                    "InvestmentTypes": \[
                        "C(1) Transferable securities",
                        "C(2) Money-market instruments",
                        "C(3) Units in collective investment undertakings",
                        "C(4) Derivatives in Securities, etc"
                    \]
                },
                }
            \],
            "PassportType": "Service",
            "PassportDirection": "Passpoting Out",
            "Directive": "Markets in Financial Instruments Directive",
            "Country": "AUSTRIA"
        }
    \]
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

Permissions

Hold the list of permissions and its investment types

Name

Name of the permission

InvestmentTypes

Display the list of investment type

PassportType

Hold the passport type information like Service

PassportDirection

Display the passport direction information e.g. Passporting Out or Passporting In

Directive

Display the directive information for country specific passport

Country

Display the country information

  

ResultInfo

  

Each message will return a common resultInfo object that will contain helpful information of the request

Name

Description /example

page

The page number of the request, when the data returned is in page, it returns the current page. For account details, it will be 1

per\_page

The number of records returned per page

total\_count

The total number of records returned by the request. For firm details it will be only 1

  

Status Code

  

Code

Description

FSR-API-02-08-00

Request Successful

FSR-API-02-08-11

Passport permission not found

FSR-API-02-08-21

Bad request. Invalid Input

FSR-API-02-08-22

Page not found