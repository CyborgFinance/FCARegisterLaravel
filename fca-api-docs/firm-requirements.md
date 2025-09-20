# Home

Firm Requirements API

  

DETAILS

#### Get information about the requirements associated with a specific firm using its Firm Reference Number

  

GET End Point URL

/V0.1/Firm/<FRN>/Requirements/

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/123570/Requirements](https://register.fca.org.uk/services/V0.1/Firm/123570/Requirements)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{
    "Status": "FSR-API-02-06-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "1",
        "total\_count": "1"
    },
    "Message": "Ok. Firm Requirements found",
    "Data": \[
        {
            "Effective Date": "23/04/2021",
            "Derivatives as incidental services only.": "The firm must not carry on a permitted activity concerning the sale of an option (including a commodity option), future (including commodity future) or contract for difference (including spread bet or rolling spot forex contract), except where the activity is incidental to services to a particular client.",
            "Requirement Reference": "OP-0123456",
            "Financial Promotions Requirement": "TRUE",
            "Financial Promotions Investment Types": "[https://register.fca.org.uk/services/V0.1/Firm/123456/Requirements/OP-0123456/InvestmentTypes](https://register.fca.org.uk/services/V0.1/Firm/123456/Requirements/OP-0123456/InvestmentTypes)"
        }
    \]
}

  

Object Definition

  

Data

  

The requirement data is presented in the array of all the requirements associated with the firm

Name

Description /example

Effective Date

Date from which the Requirement became effective

Value

The description of the requirement. The requirement data is structured in large paragraphs and therefore is represented with escape sequence to identify paragraphs, tabs and new lines

Requirement Reference

Requirement reference number

Financial Promotions Requirement

TRUE for financial promotions requirement, FALSE otherwise

Financial Promotions Investment Types

API URL for Investment Types for the Financial Promotions Requirement

  

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

Prev

URL to navigate to prev page of the pagination

Next

URL to navigate to next page of pagination

  

Status Code

  

Code

Description

FSR-API-02-06-00

Ok. Firm Requirements found

FSR-API-02-06-11

Bad Request : Invalid Input

FSR-API-02-06-21

Firm Requirements not found

FSR-API-01-01-11

Unauthorised: Please include a valid API key and Email address