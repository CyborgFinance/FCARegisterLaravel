# Home

Common Search API

  

DETAILS

#### Search the FS register using this API

  

GET End Point URL

/V0.1/Search/<Query>

  

cURL (example)

  

Common Search API – Firm
Search the FS Register for Firms matching a search term

curl -X GET "[https://register.fca.org.uk/services/V0.1/Search?q=Example](https://register.fca.org.uk/services/V0.1/Search?q=Example) Ltd&type=firm" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

Common Search API – Individual
Search the FS Register for Individuals matching a search term

curl -X GET "[https://register.fca.org.uk/services/V0.1/Search?q=John](https://register.fca.org.uk/services/V0.1/Search?q=John) Doe&type=individual" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

Common Search API – Collective Investment Scheme
Search the FS Register for Collective Investment Schemes matching a search term

curl -X GET "[https://register.fca.org.uk/services/V0.1/Search?q=ABC](https://register.fca.org.uk/services/V0.1/Search?q=ABC) Ltd&type=fund" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

FS Register for Firms matching a search term
{
    "Status": "FSR-API-04-01-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "20",
        "total\_count": "1"
    },
    "Message": "Ok. Search successful",   

 "Data": \[
         {
            "URL": "[https://register.fca.org.uk/services/V0.1/Firm/12345](https://register.fca.org.uk/services/V0.1/Firm/12345)",
            "Status": "See full details",
            "Reference Number": "12345",
            "Type of business or Individual": "Firm",
            "Name": "Example Ltd"
        } 
      \] 
    }


FS Register for Individuals matching a search term
{
    "Status": "FSR-API-04-01-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "20",
        "total\_count": "1"
    },
    "Message": "Ok. Search successful",

"Data": \[
        {
            "URL": "[https://register.fca.org.uk/services/V0.1/Individuals/12345](https://register.fca.org.uk/services/V0.1/Individuals/12345)",
            "Status": "Active",
            "Reference Number": "12345",
            "Type of business or Individual": "Individual",
            "Name": "John Doe "
        }
      \]
    }
        
FS Register for Collective Investment Schemes matching a search term
{
    "Status": "FSR-API-04-01-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "20",
        "total\_count": "1"
    },
    "Message": "Ok. Search successful",

"Data": \[
        {
            "URL": "[https://register.fca.org.uk/services/V0.1/CIS/12345](https://register.fca.org.uk/services/V0.1/CIS/12345)",
            "Status": "Approved",
            "Reference Number": "12345",
            "Type of business or Individual": "Collective investment scheme",
            "Name": "ABC Fund"
        }
      \]
    }

  

Object Definition

  

Data

  

Along with the APIs, we are providing a limited search functionality that uses and mimics the existing search. We recommend you use this service to only resolve FRNs, IRNs and PRNs and gain the URL for further fetching details. However, since this an early release, not all returned item will resolve in a URL to fetch further details.

Name

Description /example

Name

The name of the firm or individual

Type of Business or individual

The type of data returned. Example, Firm, Individual, Collective Investment Scheme

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

FSR-API-04-01-00

Ok. Search successful

FSR-API-04-01-11

No search result found

FSR-API-04-01-21

Bad request. Invalid Input

FSR-API-01-01-11

Unauthorised: Please include a valid API key and Email address