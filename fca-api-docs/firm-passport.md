# Home

Firm Passport API

  

DETAILS

#### Get information about a passport details by using its Firm Reference Number

  

GET End Point URL

/V0.1/Firm/{FRN}/Passports

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/155595/Passports/](https://register.fca.org.uk/services/V0.1/Firm/155595/Passports/)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{    
    "Status": "FSR-API-02-07-00",
    "ResultInfo": {
        "Next": "[https://register.fca.org.uk/services/V0.1/Firm/155595/Passports?pgnp=2](https://register.fca.org.uk/services/V0.1/Firm/155595/Passports?pgnp=2)",
        "page": "1",
        "per\_page": "20",
        "total\_count": "4"
    },
    "Message": "Ok. Firm Passport found",
    "Data": \[
        {
            "Passports": \[
                                {
                    "PassportDirection": "Passporting Out",
                    "Permissions": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Passports/GIBRALTAR/Permission](https://register.fca.org.uk/services/V0.1/Firm/615820/Passports/GIBRALTAR/Permission)",
                    "Country": "GIBRALTAR"
                },
                {
                    "PassportDirection": "Passporting In",
                    "Permissions": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Passports/AUSTRIA/Permission](https://register.fca.org.uk/services/V0.1/Firm/615820/Passports/AUSTRIA/Permission)",
                    "Country": "AUSTRIA"
                },
                {
                    "PassportDirection": "Passporting In",
                    "Permissions": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Passports/FRANCE/Permission](https://register.fca.org.uk/services/V0.1/Firm/615820/Passports/FRANCE/Permission)",
                    "Country": "FRANCE"
                }
            \]
        }
    \]
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

PassportDirection

The direction of the passport: Inward from the EEA to the UK, or Outward from the UK to Gibraltar

Permissions

URL for the passport in the specific country

Country

If Passporting In - Country of passport origin If Passporting Out - Country of passport destination

  

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

FSR-API-02-07-00

Request Successful

FSR-API-02-07-11

Passport not found

FSR-API-02-07-21

Bad request. Invalid Input