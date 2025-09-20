# Home

Firm Requirements Investment Types API

  

DETAILS

#### Get information about the investment types associated with a specific firm requirement using its Firm Reference Number and Requirement Reference

  

GET End Point URL

/V0.1/Firm/<FRN>/Requirements/<ReqRef>/InvestmentTypes

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/123570/Requirements/OP-0123456/InvestmentTypes](https://register.fca.org.uk/services/V0.1/Firm/123570/Requirements/OP-0123456/InvestmentTypes)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{
    "Status": "FSR-API-02-13-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "1",
        "total\_count": "1"
    },
    "Message": "Ok. Investment Types found",
    "Data": \[
        {
            "Investment Type Name": "Consumer Credit"
        }
    \]
}

  

Object Definition

  

Data

  

The firm requirements investment types data is presented in the array of all the investment types associated with the firm requirement

Name

Description /example

Investment Type Name

Name of the Investment Type associated with the Requirement

  

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

FSR-API-02-13-00

Ok. Investment Types found

FSR-API-02-13-11

Investment Types not found

FSR-API-02-13-21

Bad Request : Invalid Input

FSR-API-01-01-11

Unauthorised: Please include a valid API key and Email address