# Home

Firm API

  

DETAILS

#### Get information about a specific firm using its Firm Reference Number

  

GET End Point URL

/V0.1/Firm/<FRN>

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/401805](https://register.fca.org.uk/services/V0.1/Firm/401805)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{
    "Status": "FSR-API-02-01-00",
    "ResultInfo": {
        "page": "1",
        "per\_page": "1",
        "total\_count": "1"
    },
    "Message": "Success : Found Firm",
    "Data": \[
        {
            "Name": "[https://register.fca.org.uk/services/V0.1/Firm/401805/Names](https://register.fca.org.uk/services/V0.1/Firm/401805/Names)",
            "Individuals": "[https://register.fca.org.uk/services/V0.1/Firm/401805/Individuals](https://register.fca.org.uk/services/V0.1/Firm/401805/Individuals)",
            "Requirements": "[https://register.fca.org.uk/services/V0.1/Firm/401805/Requirements](https://register.fca.org.uk/services/V0.1/Firm/401805/Requirements)",
            "Permissions": "[https://register.fca.org.uk/services/V0.1/Firm/401805/Permissions](https://register.fca.org.uk/services/V0.1/Firm/401805/Permissions)",
            "Passport": "[https://register.fca.org.uk/services/V0.1/Firm/401805/Passports](https://register.fca.org.uk/services/V0.1/Firm/401805/Passports)",
            "Regulators": "[https://register.fca.org.uk/services/V0.1/Firm/401805/Regulators](https://register.fca.org.uk/services/V0.1/Firm/401805/Regulators)",
            "Appointed Representative": "[https://register.fca.org.uk/services/V0.1/Firm/401805/AR](https://register.fca.org.uk/services/V0.1/Firm/401805/AR)", 
            "Address": "[https://register.fca.org.uk/services/V0.1/Firm/401805/Address](https://register.fca.org.uk/services/V0.1/Firm/401805/Address)",
            "Waivers": "[https://register.fca.org.uk/services/V0.1/Firm/401805/Waivers](https://register.fca.org.uk/services/V0.1/Firm/401805/Waivers)",
            "Exclusions": "[https://register.fca.org.uk/services/V0.1/Firm/401805/Exclusions](https://register.fca.org.uk/services/V0.1/Firm/401805/Exclusions)",
            "DisciplinaryHistory": "[https://register.fca.org.uk/services/V0.1/Firm/401805/DisciplinaryHistory](https://register.fca.org.uk/services/V0.1/Firm/401805/DisciplinaryHistory)",
            "System Timestamp": "2018-10-24 09:49:29",
            "Exceptional Info Details": \[
                {
                    "Exceptional Info Title": "CAUTION",
                    "Exceptional Info Body": "As at xx date, this firm was shown on the Companies House register as ‘dissolved’. We are currently carrying out further investigations about this firm’s current status. If you have any concerns about this firm, please report these to the [FCA.2.As](https://FCA.2.As) at xx date, this firm was shown on the Companies House register as ‘dissolved’. [3.As](https://3.As) at xx date, this firm was shown on the Companies House register as ‘dissolved’. We are currently carrying out further investigations about this firm’s current status. If you have any concerns about this firm, please report these to the FCA. We are currently carrying out further investigations about this firm’s current status. If you have any concerns about this firm, please report these to the FCA."
                },
                {
                    "Exceptional Info Title": "ATTENTION - Firm in a compromise arrangement",
                    "Exceptional Info Body": "This firm has entered into a statutory compromise arrangement with its creditors and/or shareholders. This means it has entered into an arrangement with its creditors and/or shareholders which has altered the rights and obligations of the parties. It remains authorised and has to continue to meet our regulatory standards, including when dealing with its customers. Firms enter into a compromise arrangement for various reasons, so if you are a customer check with the firm to determine whether the compromise arrangement affects you."
                }
            \],
            "Status Effective Date": "Wed Sep 01 00:00:00 GMT 2004",
            "Status": "Authorised",
            "Business Type": "Regulated",
            "Organisation Name": "Firm Name"
        }
    \]
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

Organisation Name

The name of the firm /FCA

Status

Register Status for the firm /Authorised

Business Type

The type of the firm /Regulated

Status Effective Date

The effective date when the status was active from

Address

URL to fetch the address and contact details of the firm

Permissions

URL to fetch the associated permissions of the firm

Individuals

URL to fetch the Individuals associated with the firm

Names

URL to fetch other trading name/ brand name for the firm

Exceptional Info Details

Additional information about the notices associated with the firm

  

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

FSR-API-02-01-00

SUCCESS : Account Found

FSR-API-02-01-11

Bad Request : Invalid Input

FSR-API-02-01-21

ERROR : Account Not Found

FSR-API-01-01-11

Unauthorised: Please include a valid API key and Email address