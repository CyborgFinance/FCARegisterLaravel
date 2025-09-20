# Home

Firm Exclusions API

  

DETAILS

#### Get information about an Exclusion on a firm using it's Firm Reference Number

  

GET End Point URL

/V0.1/Firm/{FRN}/Exclusions

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/999001/Exclusions](https://register.fca.org.uk/services/V0.1/Firm/999001/Exclusions)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{
    ";Status": "FSR-API-02-10-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "10",
        "total\_count": "2"
    },
    "Message": "Ok. Exclusions Information found",
    "Data": \[
        {
            "PSD2\_Exclusion\_Type": "Limited Network Exclusion",
            "Particular\_Exclusion\_relied\_upon": "2(k)(i) – allow the holder to acquire goods or services only in the issuer’s premises",
            "Description\_of\_services": "ssssssss"
        },
        {
            "PSD2\_Exclusion\_Type": "Electronic Communication Exclusion",
            "Particular\_Exclusion\_relied\_upon": "(i) for purchase of digital content and voice-based services charged to the related bill",
            "Description\_of\_services": "ssssssss"
   }
 \]
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

PSD2\_Exclusion\_Type

Display the Exclusion type information

Particular\_Exclusion\_relied\_upon

Display the Exemption Rule information

Description\_of\_services

Display the description information

  

ResultInfo

  

Each message will return a common resultInfo object that will contain helpful information of the request

Name

Description /example

page

The page number of the request, when the data returned is in page, it returns the current page. For account details, it will be 1

per\_page

The number of records returned per page

total\_count

The total number of records returned by the request. For firm details it will be 2

  

Status Code

  

Code

Description

FSR-API-02-10-00

Ok. Exclusions information found

FSR-API-02-10-11

Exclusions information not found

FSR-API-02-10-21

Bad request. Invalid Input

FSR-API-02-10-22

Page Not found

FSR-API-01-01-21

Forbidden