# Home

Firm Waiver API

  

DETAILS

#### Get information about a Waiver on a firm using it's Firm Reference Number

  

GET End Point URL

V0.1/Firm/{FRN}/Waiver

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/999001/Waivers](https://register.fca.org.uk/services/V0.1/Firm/999001/Waivers) 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{
    "Status": "FSR-API-02-14-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "10",
        "total\_count": "2"
    },
    "Message": "Ok. Waiver information found",
    "Data": \[
        {
            "Waivers\_Discretions\_URL": "[https://register.fca.org.uk/servlet/servlet.FileDownload?file=00P1x000000ngy7EAA](https://register.fca.org.uk/servlet/servlet.FileDownload?file=00P1x000000ngy7EAA)",
            "Waivers\_Discretions": "AuPo\_Application\_\_c-LEX Connect2 Layout.layout",
            "Rule\_ArticleNo":\[
                       "BIA - CRR 55551",
                       "BIA - CRR 50"
    \]
        },
        {
            "Waivers\_Discretions\_URL": "[https://register.fca.org.uk/servlet/servlet.FileDownload?file=00P1x000000nnI9EAI](https://register.fca.org.uk/servlet/servlet.FileDownload?file=00P1x000000nnI9EAI)",
            "Waivers\_Discretions": "AuPo\_AuditForm\_\_c-Audit Form Layout.layout",
            "Rule\_ArticleNo":\[ 
                            "BIA - CRR null"
                 \]
   }
 \]
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

Waivers\_Discretions\_URL

Display the waivers attachment URL information

Waivers\_Discretions

Display the waivers attachment name information

Rule\_ArticleNo

Display the waivers RuleHandbook name and Subrule number information

  

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

FSR-API-02-14-00

Ok. Waiver information found

FSR-API-02-14-11

Waiver information not found

FSR-API-02-14-21

Bad request. Invalid Input

FSR-API-01-01-21

Forbidden

FSR-API-02-14-22

Page not found