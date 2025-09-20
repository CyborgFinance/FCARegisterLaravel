# Home

Regulated Market API

  

DETAILS

#### Search the FS register using this API

  

GET End Point URL

/V0.1/CommonSearch?q=RM

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/CommonSearch?q=RM](https://register.fca.org.uk/services/V0.1/CommonSearch?q=RM)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{
    "Status": "FSR-API-06-04-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "20",
        "total\_count": "1"
    },
    "Message": "Ok. Regulated market information found",
    "Data": \[
        {
            "Name": "test RM",
            "TradingName": "test,test2",
            "Type of business or Individual": "Exchange",
            "Reference Number": "401805",
            "Status": "Authorised",
            "FirmURL": "[https://register.fca.org.uk/services/V0.1/Firm/401805](https://register.fca.org.uk/services/V0.1/Firm/401805)"
        }
    \]
}

  

Object Definition

  

Data

  

Along with the APIs, we are providing a limited search functionality that uses and mimics the existing search. We recommend you use this service to only resolve FRNs and IRNs and gain the URL for further fetching details. However, since this an early release, not all returned item will resolve in a URL to fetch further details.

Name

Description /example

Name

The name of the firm or individual

TradingName

The Trading Name of the firm or individual

Type of Business or individual

The type of data returned. Example, Firm, Individual

Reference Number

The Unique number of the record

Status

The status of the record

URL

API to fetch the detail record of the data

  

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

FSR-API-06-04-00

Ok. Regulated market information found

FSR-API-06-04-21

Bad Request : Invalid Input

FSR-API-06-04-11

Regulated market information not found

FSR-API-06-04-22

Page not found