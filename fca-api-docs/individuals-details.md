# Home

Individuals Details API

  

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
                "Status": "Certified/assessed by firm",
                "Disciplinary History": "[https://register.fca.org.uk/services/V0.1/Individuals/JOB01749/DisciplinaryHistory](https://register.fca.org.uk/services/V0.1/Individuals/JOB01749/DisciplinaryHistory)",
                "Roles & Activities": "[https://register.fca.org.uk/services/V0.1/Individuals/JXD01375/CF](https://register.fca.org.uk/services/V0.1/Individuals/JXD01375/CF)",
                "IRN": "JXD01375",
                "Commonly Used Name": "Claire",
                "Full Name": "Claire Bell"
            },

            "Workplace Location 1": {
                "Firm Name": "Bank of XXXXXXX",
                "Location 1": "City of Edinburgh"
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

Status

The status of the individual

Commonly Used Name

Commonly used names of the individual

Roles & activities

URL to fetch all the roles of an individual

Disciplinary History

URL to fetch the Disciplinary History

Workplace Location

The firm name & geographical location of an individual’s workplace(s) displayed at the town/city line of the address where holding a customer-facing role

  

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