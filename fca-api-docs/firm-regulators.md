# Home

Firm Regulators API

  

DETAILS

#### Get information about a regulator on a firm using its Firm Reference Number

  

GET End Point URL

/V0.1/Firm/{FRN}/Regulators

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/122702/Regulators/](https://register.fca.org.uk/services/V0.1/Firm/122702/Regulators/)"
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{
    "Status": "FSR-API-02-09-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "10",
        "total\_count": "4"
    },
    "Message": "Ok. Firm Regulator found",
    "Data": \[
        {
            "Termination Date": "",
            "Effective Date": "01/04/2013",
            "Regulator Name": "Financial Conduct Authority"
        },
        {
            "Termination Date": "31/03/2013",
            "Effective Date": "01/12/2001",
            "Regulator Name": "Financial Services Authority"
        },
        {
            "Termination Date": "",
            "Effective Date": "01/04/2013",
            "Regulator Name": "Prudential Regulation Authority"
        },
        {
            "Termination Date": "30/11/2001",
            "Effective Date": "25/11/1993",
            "Regulator Name": "Securities and Futures Authority"
        }
    \]
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

Regulator Name

Name of the Regulator

Effective Date

The date from which the regulator was effective from

Termination Date

The date until which the regulator will be valid

  

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

FSR-API-02-09-00

Request Successful

FSR-API-02-09-11

Regulators not found

FSR-API-02-09-21

Bad request. Invalid Input