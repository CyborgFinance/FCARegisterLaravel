# Home

Firm Individuals API

  

DETAILS

#### Get information about the Individuals associated with a firm using its Firm Reference Number

  

GET End Point URL

/V0.1/Firm/<FRN>/Individuals

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/999004/Individuals](https://register.fca.org.uk/services/V0.1/Firm/999004/Individuals)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{
    "Status": "FSR-API-02-05-00",
    "ResultInfo": {
        "Next": "[https://register.fca.org.uk/services/V0.1/Firm/999001/Individuals?pgnp=2](https://register.fca.org.uk/services/V0.1/Firm/999001/Individuals?pgnp=2)",
        "page": "1",
        "per\_page": "20",
        "total\_count": "4"
    },
    "Message": "Ok. Firm Individuals found",
    "Data": \[
        {
            "Status": "Regulatory approval no longer required",
            "URL": "[https://register.fca.org.uk/services/V0.1/Individuals/789018](https://register.fca.org.uk/services/V0.1/Individuals/789018)",
            "IRN": "789018",
            "Name": "Jessica Davies"
        },
        {
            "Status": "Approved by regulator;Certified / assessed by firm",
            "URL": "[https://register.fca.org.uk/services/V0.1/Individuals/AXA00001](https://register.fca.org.uk/services/V0.1/Individuals/AXA00001)",
            "IRN": "AXA00001",
            "Name": "Firstname Lastname"
        },
        {
            "Status": "Approved by regulator",
            "URL": "[https://register.fca.org.uk/services/V0.1/Individuals/ASK00001](https://register.fca.org.uk/services/V0.1/Individuals/ASK00001)",
            "IRN": "ASK00001",
            "Name": "Tony Smith"
        },
        {
            "Status": "Prohibited",
            "URL": "[https://register.fca.org.uk/services/V0.1/Individuals/PRO00001](https://register.fca.org.uk/services/V0.1/Individuals/PRO00001)",
            "IRN": "PRO00001",
            "Name": "Mike Jones"
        },
        {
            "Status": "Certified / assessed by firm",
            "URL": "[https://register.fca.org.uk/services/V0.1/Individuals/VXL02293](https://register.fca.org.uk/services/V0.1/Individuals/VXL02293)",
            "IRN": "VXL02293",
            "Name": "John Smith"
        }
    \]
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

Name

The name of the Individual /John Smith

IRN

Individual Reference Number /JXD01375

Status

The status of the individual

URL

URL to fetch the control functions for this individual

  

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

FSR-API-02-05-00

SUCCESS : Firm Individuals found

FSR-API-02-05-11

Bad Request : Invalid Input

FSR-API-02-05-21

ERROR : Individual Not Found

FSR-API-01-01-11

Unauthorised: Please include a valid API key and Email address