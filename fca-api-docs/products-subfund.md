# Home

Subfund Details API

  

DETAILS

#### Get information about subfund of a product by using it's Product Reference Number

  

GET End Point URL

/V0.1/CIS/{PRN}/Subfund

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/CIS/185045/Subfund](https://register.fca.org.uk/services/V0.1/CIS/185045/Subfund)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{

    "Status": "FSR-API-05-03-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "20",
        "total\_count": "2"
    },
    "Message": "Ok. Product Subfund Found",
    "Data": \[
        {
            "URL": "[https://register.fca.org.uk/services/V0.1/CIS/185045](https://register.fca.org.uk/services/V0.1/CIS/185045)",
            "Sub-Fund Type": "Other",
            "Name": "a3gb00000000925"
        },
        {
            "URL": "[https://register.fca.org.uk/services/V0.1/CIS/185045](https://register.fca.org.uk/services/V0.1/CIS/185045)",
            "Sub-Fund Type": "Other",
            "Name": "a3gb00000000924"
        }
    \]

}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

URL

Display the subfund product information

Name

Display the subfund name information

Sub-Fund Type

Display the subfund type information

  

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

FSR-API-05-03-00

Request Successful

FSR-API-05-03-11

Subfund not found

FSR-API-05-02-21

Bad request. Invalid Input

FSR-API-01-01-21

Forbidden