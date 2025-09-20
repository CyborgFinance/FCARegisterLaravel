# Home

Firm Controlled Functions API

  

DETAILS

#### Get information about the controlled functions of a firm using its Firm Reference Number

  

GET End Point URL

/V0.1/Firm/<FRN>/CF

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/12345/CF](https://register.fca.org.uk/services/V0.1/Firm/12345/CF)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{  
    "Status": "FSR-API-02-12-00",  
    "ResultInfo": {  
        "page": "1",  
        "per\_page": "20",  
        "total\_count": "5"  
    },  
  
    "Message": "SUCCESS : Control Function Found",  
    "Data": \[  
        {  
           "Current": {  
                "SMF1 Chief Executive": {  
                    "Suspension / Restriction End Date": "",  
                    "Suspension / Restriction Start Date": "",  
                    "Restriction": "",  
                    "Effective Date": "06/10/2020",  
                    "Individual Name": "Jessica Davies",  
                    "Name": "SMF1 Chief Executive",  
                    "URL": "[https://register.fca.org.uk/services/V0.1/Individuals/123459](https://register.fca.org.uk/services/V0.1/Individuals/123459)"  
                },  
  
                "\[FCA CF\] Functions requiring qualifications": {  
                    "Suspension / Restriction End Date": "",  
                    "Suspension / Restriction Start Date": "",  
                    "Restriction": "",  
                    "Effective Date": "01/02/2021",  
                    "Individual Name": "Tony Smith",  
                    "Name": "\[FCA CF\] Functions requiring qualifications",  
                    "URL": "[https://register.fca.org.uk/services/V0.1/Individuals/123460](https://register.fca.org.uk/services/V0.1/Individuals/123460)"  
                }  
            },  
            "Previous": {  
                "SMF17 Money Laundering Reporting Officer (MLRO)": {  
                    "End Date": "01/03/2022",  
                    "Suspension / Restriction End Date": "",  
                    "Suspension / Restriction Start Date": "",  
                    "Restriction": "",  
                    "Effective Date": "04/01/2021",  
                    "Individual Name": "John Smith",  
                    "Name": "SMF17 Money Laundering Reporting Officer (MLRO)",  
                    "URL": "[https://register.fca.org.uk/services/V0.1/Individuals/123456](https://register.fca.org.uk/services/V0.1/Individuals/123456)"  
                },  
  
                "\[FCA CF\] Functions requiring qualifications": {  
                    "End Date": "01/01/2023",  
                    "Suspension / Restriction End Date": "",  
                    "Suspension / Restriction Start Date": "",  
                    "Restriction": "",  
                    "Effective Date": "11/01/2021",  
                    "Individual Name": "Mike Jones",  
                    "Name": "\[FCA CF\] Functions requiring qualifications",  
                    "URL": "[https://register.fca.org.uk/services/V0.1/Individuals/123457](https://register.fca.org.uk/services/V0.1/Individuals/123457)"  
                },  
  
                "CF1 Director": {  
                    "End Date": "01/08/2021",  
                    "Suspension / Restriction End Date": "",  
                    "Suspension / Restriction Start Date": "",  
                    "Restriction": "",  
                    "Effective Date": "31/08/2020",  
                    "Individual Name": "Claire Bell",  
                    "Name": "CF1 Director",  
                    "URL": "[https://register.fca.org.uk/services/V0.1/Individuals/123458](https://register.fca.org.uk/services/V0.1/Individuals/123458)"  
                }  
            }  
        }  
    \]  
}

  

Object Definition

  

Data

  

The Control function data is presented in the Data Object returned in the response

Name

Description /example

Current

List of all current roles

Previous

List of all previous roles

Effective Date

Date from which the role was effective

End Date

Date on which the role was ended

Individual Name

The name of the individual who carries out the role

Name

The name of the role

Suspension / Restriction Start Date

Date from when a suspension or restriction was active

Suspension / Restriction End Date

Date from when a suspension or restriction was ended

URL

URL to fetch the associated individual

  

ResultInfo

  

Each message will return a common resultInfo object that will contain helpful information of the request

Name

Description /example

page

The page number of the request, when the data returned is in page, it returns the current page.

per\_page

The number of records returned per page

total\_count

The total number of records returned by the request.

  

Status Code

  

Code

Description

FSR-API-02-12-00

SUCCESS : Control Function Found

FSR-API-02-12-11

ERROR : Control Function not Found

FSR-API-02-12-21

Bad Request: Invalid Input

FSR-API-02-12-22

Page Not found

FSR-API-01-01-11

Unauthorised: Please include a valid API key and Email address