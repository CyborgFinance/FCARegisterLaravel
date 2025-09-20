# Home

Firm Activities and Permissions API

  

DETAILS

#### Get information about the activities and permissions associated with a specific firm using its Firm Reference Number

  

GET End Point URL

/V0.1/Firm/<FRN>/Permissions/

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/123570/Permissions](https://register.fca.org.uk/services/V0.1/Firm/123570/Permissions)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{  
    "Status": "FSR-API-02-03-00",  
    "ResultInfo": {  
        "page": "1",  
        "per\_page": "20",  
        "total\_count": "10"  
    },  
    "Message": "Ok. Firm permission found",  
    "Data": {  
        "Acting as a CBTL advisor": \[  
            {  
                "Acting as a CBTL advisor": \[  
                    "1"  
                \]  
            }  
        \],  
        "Acting as a CBTL administrator": \[  
            {  
                "Acting as a CBTL administrator": \[  
                    "1"  
                \]  
            }  
        \],  
        "CBTL Status": \[  
            {  
                "CBTL Status": \[  
                    "Registered"  
                \]  
            }  
        \],  
        "CBTL Effective Date": \[  
            {  
                "CBTL Effective Date": \[  
                    "21/04/2021"  
                \]  
            }  
        \],  
        "Entering into Regulated Consumer Hire Agreements as owner": \[  
            {  
                "Limitation": \[  
                    "The firm is limited to credit broking as a supplier of goods or services (other than a domestic premises supplier) carried on for the purposes of, or in connection with, the sale of goods or supply of services by the firm to a customer (who need not be the borrower under the credit agreement or the hirer under the consumer hire agreement) and, unless the firm is a not-for profit body, under which the obligation of the borrower to repay is not secured, and is not to be secured, by a legal mortgage on land."  
                \]  
            }  
        \],  
        "Agreeing to carry on a regulated activity": \[  
            {  
                "Limitation Not Found": \[  
                    "Valid limitation not present"  
                \]  
            }  
        \],  
        "Acting as a CBTL Administrator": \[  
            {  
                "Limitation Not Found": \[  
                    "Valid limitation not present"  
                \]  
            }  
        \]  
    }  
}

  

Object Definition

  

Data

  

The activity and permission data is structured in a complex way in the JSON. A firm can have multiple activities and permissions. We will be publishing the permissions as an array with each string enlisting the Activity and the value containing the object arrays for related customer types, Investment types and limitations

Name

Description /example

String Value

Activity or permission associated with the Firm

Customer Type

An array of Customer Types, if available, on the activity and permission

Investment Type

An array of Investment Types, if available, on the activity and permission

Limitation

An array of all limitations associated with the activity and permission

Acting as a CBTL advisor

Ability to carry out relevant CBTL activity

Acting as a CBTL administrator

Ability to carry out relevant CBTL activity

Acting as a CBTL arranger

Ability to carry out relevant CBTL activity

Acting as a CBTL lender

Ability to carry out relevant CBTL activity

CBTL Status

Status of the firm in relation to consumer buy-to-let mortgages under the Mortgage Credit Directive

CBTL Effective Date

Date from which the CBTL Status was effective

  

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

Prev

URL to navigate to prev page of the pagination

Next

URL to navigate to next page of pagination

  

Status Code

  

Code

Description

FSR-API-02-03-00

Ok. Firm permission found

FSR-API-02-03-11

Bad Request : Invalid Input

FSR-API-02-03-21

Firm permission not found

FSR-API-01-01-11

Unauthorised: Please include a valid API key and Email address