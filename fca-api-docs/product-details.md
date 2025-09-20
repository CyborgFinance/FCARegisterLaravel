# Home

Product Details API

  

DETAILS

#### Get information about a products by using its Product Reference Number

  

GET End Point URL

/V0.1/CIS/{PRN}

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/CIS/767821](https://register.fca.org.uk/services/V0.1/CIS/767821)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)"
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{

    "Status": "FSR-API-05-01-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "1",
        "total\_count": "1"
    },
    "Message": "Ok. Product Found",
    "Data": \[
        {
            "Sub-funds": "[https://register.fca.org.uk/services/V0.1/CIS/767821/Subfund](https://register.fca.org.uk/services/V0.1/CIS/767821/Subfund)",
            "Other Name": "[https://register.fca.org.uk/services/V0.1/CIS/767821/Names](https://register.fca.org.uk/services/V0.1/CIS/767821/Names)",
            "CIS Depositary": "[https://register.fca.org.uk/services/V0.1/Firm/441780](https://register.fca.org.uk/services/V0.1/Firm/441780)",
            "CIS Depositary Name": "Northern Trust Fiduciary Services (Ireland) Limited",
            "Operator Name": "1167 Active Funds ICAV",
            "Operator": "[https://register.fca.org.uk/services/V0.1/Firm/767820](https://register.fca.org.uk/services/V0.1/Firm/767820)",
            "MMF Term Type": "",
            "MMF NAV Type": "",
            "Effective Date": "20/12/2016",
            "Scheme Type": "Offshore",
            "Product Type": "Offshore OEIC",

            "ICVC Registration No": "",
            "Status": "Recognised"
        }
    \]
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

Sub-funds

Display the sub fund information

Other Name

Display the other name information

CIS Depositary

Display CIS depositary information

CIS Depositary Name

Display CIS depositary name information

Operator Name

Display the operator name information

Operator

Display the operator information

MMF Term Type

Display the MMF Term Type information

MMF NAV Type

Display the MMF NAV Type information

Effective Date

Display the Effective Date information

Scheme Type

Display the Scheme Type information

Product Type

Display the Product Type information

ICVC Registration No

Display the ICVC Registration No information

Status

Display the Status information

  

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

FSR-API-05-01-00

Request Successful

FSR-API-05-01-11

When the SOQL returns more than one or no record

FSR-API-05-01-21

Firm not found

FSR-API-04-01-21

Bad request. Invalid Input