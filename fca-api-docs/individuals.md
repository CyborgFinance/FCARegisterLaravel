# Home

Individuals API

  

DETAILS

#### Get information about the Individuals associated with its Individual Reference Number

  

GET End Point URL

/V0.1/Individuals/<IRN>

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Individuals/JOB01749](https://register.fca.org.uk/services/V0.1/Individuals/JOB01749)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{
    "Status": "FSR-API-03-01-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "1",
        "total\_count": "1"
    },
    "Message": "Ok. Individual found",
    "Data": \[
        {
            "Details": {
                "Controlled Functions": "https://**[register.fca.org.uk](https://register.fca.org.uk)**/services/V0.1/Individuals/JOB01749/CF",
                "IRN": "JOB01749",
                "Commonly Used Name": "null",
                "Individual Status": "Active",
                "Full Name": "Brian Abdelhadi"
            }
        }
    \]
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

Full Name

The name of the Individual /John Doe

IRN

Individual Reference Number /JXD01375

Individual Status

The status of the individual /Authorised

Controlled Functions

URL to fetch the control functions

  

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

FSR-API-03-01-00

Ok. Individual found

FSR-API-03-01-11

Bad Request : Invalid Input

FSR-API-03-01-21

ERROR : Individual Not Found

FSR-API-01-01-11

Unauthorised: Please include a valid API key and Email address