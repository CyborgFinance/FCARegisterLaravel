# Home

Firm Appointed Representative API

  

DETAILS

#### Get information about the Appointed Representatives associated with a firm using its Firm Reference Number

  

GET End Point URL

/V0.1/Firm/<FRN>/AR

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/482398/AR](https://register.fca.org.uk/services/V0.1/Firm/482398/AR)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{
    "Status": "FSR-API-05-04-00",
    "ResultInfo": {
        "Next": "[https://register.fca.org.uk/services/V0.1/Firm/999001/AR?pgnp=2](https://register.fca.org.uk/services/V0.1/Firm/999001/AR?pgnp=2)",
        "page": "1",
        "per\_page": "20",
        "total\_count": "4"
    },
    "Message": "Ok. Appointed Representative Found",
    "Data": {
        "PreviousAppointedRepresentatives": \[
            {
                "URL": "[https://register.fca.org.uk/services/V0.1/Firm/999054](https://register.fca.org.uk/services/V0.1/Firm/999054)",
                "Termination Date": "06/04/2021",
                "Record SubType": "Full",
                "Principal FRN": "999001",
                "Principal Firm Name": "ABC Test Principal Firm",
                "Effective Date": "03/03/2015",
                "EEA Tied Agent": "false",
                "Tied Agent": "true",
                "Insurance Distribution": "true",
                "FRN": "999054",
                "Name": "AR Firm 1"
            },
            {
                "URL": "[https://register.fca.org.uk/services/V0.1/Firm/999006](https://register.fca.org.uk/services/V0.1/Firm/999006)",
                "Termination Date": "22/04/2021",
                "Record SubType": "Full",
                "Principal FRN": "999001",
                "Principal Firm Name": "ABC Test Principal Firm",
                "Effective Date": "03/03/2015",
                "EEA Tied Agent": "false",
                "Tied Agent": "true",
                "Insurance Distribution": "false",
                "FRN": "999006",
                "Name": "AR Firm 2"
            }
        \],
        "CurrentAppointedRepresentatives": \[
            {
                "URL": "[https://register.fca.org.uk/services/V0.1/Firm/999060](https://register.fca.org.uk/services/V0.1/Firm/999060)",
                "Record SubType": "Full",
                "Principal FRN": "999001",
                "Principal Firm Name": "ABC Test Principal Firm",
                "Effective Date": "03/03/2015",
                "EEA Tied Agent": "false",
                "Tied Agent": "false",
                "Insurance Distribution": "true",
                "FRN": "999060",
                "Name": "AR Firm 3"
            },
            {
                "URL": "[https://register.fca.org.uk/services/V0.1/Firm/999008](https://register.fca.org.uk/services/V0.1/Firm/999008)",
                "Record SubType": "Full",
                "Principal FRN": "999001",
                "Principal Firm Name": "ABC Test Principal Firm",
                "Effective Date": "03/03/2015",
                "EEA Tied Agent": "false",
                "Tied Agent": "false",
                "Insurance Distribution": "true",
                "FRN": "999008",
                "Name": "AR Firm 4"
            }
        \]
    }
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

URL

URL to fetch Appointed Representative firm details

Record SubType

Identifies whether they are an Introducer AR or Full AR

Effective Date

Date from which the relationship with the principal firm was effective

Termination Date

Date from which the relationship with the principal firm was end dated

Principal FRN

FRN of the principal firm

Principal Firm

Firm name of the principal firm

EEA Tied Agent

EEA Tied Agent status of appointed representative firm

Tied Agent

Tied Agent status of appointed representative firm

Insurance Distribution

Insurance distribution status of appointed representative firm

FRN

FRN of the appointed representative firm

Name

Name of the appointed representative firm

  

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

FSR-API-05-04-00

SUCCESS : Ok. Appointed Representative Found

FSR-API-05-04-21

Bad Request : Invalid Input

FSR-API-05-04-11

ERROR : Appointed Representative not found

FSR-API-02-07-22

ERROR : Page Not Found