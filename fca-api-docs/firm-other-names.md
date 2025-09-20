# Home

Firm Other Names API

  

DETAILS

#### Get information about the other names used by the firms using its Firm Reference Number

  

GET End Point URL

/V0.1/Firm/<FRN>/Names

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/999004/Names](https://register.fca.org.uk/services/V0.1/Firm/999004/Names)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{
  "Status": "FSR-API-02-04-00",
  "ResultInfo": {
    "Next": "[https://register.fca.org.uk/services/V0.1/Firm/999004/Names?pgnp=2](https://register.fca.org.uk/services/V0.1/Firm/999004/Names?pgnp=2)",
    "page": "1",
    "per\_page": "10",
    "total\_count": "29"
  },
  "Message": "Success : Found Trading Names or Brand Names",
  "Data": \[
    {
      "Current Names": \[
        {
          "Effective From": "Tue Jul 03",
          "Status": "Registered",
          "Name": "Some Brand Name"
        },
        {
          "Effective From": "Fri Jan 12",
          "Status": "Trading",
          "Name": "Some Trading Name"
        }
      \]
    },
    {
      "Previous Names": \[
        {
          "Effective To": "Thu Apr 15 00:00:00 GMT 2010",
          "Effective From": "Wed Aug 12 00:00:00 GMT 2015",
          "Status": "Registered",
          "Name": "Sample Name"
        },
        {
          "Effective To": "Wed Aug 12 00:00:00 GMT 2015",
          "Effective From": "Fri Nov 08 00:00:00 GMT 2013",
          "Status": "Registered",
          "Name": "Sample Name 2"
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

Current Names

List of all current name of the firm

Effective From

The date from when the name was effective

Status

The register status of the firm

Name

The brand name or trading name

Previous Names

List of all current name of the firm

Effective To

The date when the name ceased to exist

  

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

FSR-API-02-04-00

SUCCESS : Found Trading Names or Brand Names

FSR-API-02-04-11

Bad Request : Invalid Input

FSR-API-02-04-21

ERROR : Trading name Not Found

FSR-API-02-04-22

ERROR : Page Not found

FSR-API-01-01-11

Unauthorised: Please include a valid API key and Email address