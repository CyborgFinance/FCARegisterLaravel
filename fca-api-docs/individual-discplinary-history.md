# Home

Individual Disciplinary History API

  

DETAILS

#### Get information about Disciplinary History on an Individual using it's Individual Reference Number

  

GET End Point URL

/V0.1/Individuals/<IRN>/DisciplinaryHistory

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Individuals/JOB01749/DisciplinaryHistory](https://register.fca.org.uk/services/V0.1/Individuals/JOB01749/DisciplinaryHistory)

   -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\

   -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41"

   -H "Content-Type: application/json"

  

Response (example)

  

{  
     "Status": "FSR-API-03-03-00",  
     "ResultInfo": {  
             "page": "1",  
             "per\_page": "10",  
             "total\_count": "1"  
      },  
     "Message": "Ok. Disciplinary history information found",  
     "Data": \[  
           {  
                "TypeofDescription": "The Financial Services and Market Act 2000 (FSMA) came into force on 1 December 2001.",  
                "TypeofAction": "Withdrawal of approval",  
                "EnforcementType": "PSD",  
                "ActionEffectiveFrom": "12/08/2019"  
           }  
     \]  
}

  

Object Definition

  

Data

  

The individual data is presented in the Data Object returned in the response

Name

Description /example

TypeofDescription

Display the final notice information of Disciplinary history

TypeofAction

Display the Type of Action information of Disciplinary history

EnforcementType

Display the Enforcement Type information of Disciplinary history

ActionEffectiveFrom

Display the Action Date information of Disciplinary history

  

ResultInfo

  

Each message will return a common resultInfo object that will contain helpful information of the request

Name

Description /example

page

The page number of the request, when the data returned is in page, it returns the current page. For account details, it will be 1

per\_page

The number of records returned per page

total\_count

The total number of records returned by the request. For firm details it will be 2

  

Status Code

  

Code

Description

FSR-API-03-03-00

Ok. Disciplinary history information found

FSR-API-03-03-11

Disciplinary history information not found

FSR-API-03-03-21

Bad request. Invalid Input

FSR-API-01-01-21

Forbidden

FSR-API-03-03-22

Page not found