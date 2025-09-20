# Home

Other Name Details API

  

DETAILS

#### Get information about other names of a product by using it's Product Reference Number

  

GET End Point URL

/V0.1/CIS/{PRN}/Names

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/CIS/767821/Names](https://register.fca.org.uk/services/V0.1/CIS/767821/Names)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{

    "Status": "FSR-API-05-03-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "20",
        "total\_count": "1"
    },
    "Message": "Ok. Product Other Name Found",
    "Data": \[
        {
            "Effective To": "06/02/2019",
            "Effective From": "20/12/2016",
            "Product Other Name": "ACTIVE FUNDS ICAV"
        }
    \]

}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

Effective To

Display the other name effective to information

Effective From

Display the other name effective from information

Product Other Name

Display the other name name information

  

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

FSR-API-05-02-00

Request Successful

FSR-API-05-02-11

Product Other Name not found

FSR-API-05-02-21

Bad request. Invalid Input

FSR-API-01-01-21

Forbidden