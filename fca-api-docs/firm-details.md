# Home

Firm Details API

  

DETAILS

#### Get information about a specific firm using its Firm Reference Number

  

GET End Point URL

/V0.1/Firm/<FRN>

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/615820](https://register.fca.org.uk/services/V0.1/Firm/615820)" 
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
    "Message": "Ok. Firm Found",
    "Data": \[
        {
            "Name": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Names](https://register.fca.org.uk/services/V0.1/Firm/615820/Names)",
            "Individuals": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Individuals](https://register.fca.org.uk/services/V0.1/Firm/615820/Individuals)",
            "Requirements": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Requirements](https://register.fca.org.uk/services/V0.1/Firm/615820/Requirements)",
            "Permission": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Permissions](https://register.fca.org.uk/services/V0.1/Firm/615820/Permissions)",
            "Passport": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Passports](https://register.fca.org.uk/services/V0.1/Firm/615820/Passports)",
            "Regulators": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Regulators](https://register.fca.org.uk/services/V0.1/Firm/615820/Regulators)",
            "Appointed Representative": "[https://register.fca.org.uk/services/V0.1/Firm/615820/AR](https://register.fca.org.uk/services/V0.1/Firm/615820/AR)",
            "Address": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Address](https://register.fca.org.uk/services/V0.1/Firm/615820/Address)",
            "Waivers": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Waivers](https://register.fca.org.uk/services/V0.1/Firm/615820/Waivers)",
            "Exclusions": "[https://register.fca.org.uk/services/V0.1/Firm/615820/Exclusions](https://register.fca.org.uk/services/V0.1/Firm/615820/Exclusions)",
            "DisciplinaryHistory": "[https://register.fca.org.uk/services/V0.1/Firm/615820/DisciplinaryHistory](https://register.fca.org.uk/services/V0.1/Firm/615820/DisciplinaryHistory)",
            "System Timestamp": "30/04/2021 08:38",
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
            "Status Effective Date": "31/08/2018",
            "E-Money Agent Status": "EMD Agent Revoked",
            "PSD / EMD Effective Date": "31/08/2018",
            "Client Money Permission": "Hold and control client money",
            "Sub Status Effective from": "29/04/2021",
            "Sub-Status": "In Administration",
            "Mutual Society Number": "656743",
            "Companies House Number": "8755483",
            "MLRs Status Effective Date": "15/04/2021",
            "MLRs Status": "MLRs Registered",
            "E-Money Agent Effective Date": "22/04/2021",
            "PSD Agent Effective date": "04/08/2014",
            "PSD Agent Status": "PSD Agent Former",
            "PSD / EMD Status": "Cancelled - Small PI",
            "Status": "Authorised",
            "Business Type": "Regulated",
            "Organisation Name": "ABC LTD",
            "FRN": "615820"
        }
    \]
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

Names

URL to fetch other trading name/ brand name for the firm

Individuals

URL to fetch the Individuals associated with the firm

Requirements

URL to fetch associated requirements of the firm

Permissions

URL to fetch the associated permissions of the firm

Passport

URL to fetch the associated passports of the firm

Regulators

URL to fetch the associated regulators of the firm

Appointed Representative

URL to fetch the associated appointed representatives of the firm

Address

URL to fetch the address and contact details of the firm

Waivers

URL to fetch the associated waivers of the firm

Exclusions

URL to fetch the exclusions associated with the firm

DisciplinaryHistory

URL to fetch any disciplinary history against the firm

Exceptional Info Details

Additional information about the notices associated with the firm

Status Effective Date

The effective date when the status was active from

E-Money Agent Status

Status as an E-Money Agent

PSD / EMD Effective Date

Date from which the PSD/EMD Status was effective

Client Money Permission

Permission of the firm in relation to Client Money

Sub Status Effective from

Date from which the Sub-status was effective

Sub-Status

Related sub-status to the firms status

Mutual Society Number

Registered number as a Mutual Society

Companies House Number

Registered number with Companies House

MLRs Status Effective Date

Date from which the MLRs Status was effective

MLRs Status

Status under the Money Laundering Regulations

E-Money Agent Effective Date

Date from which the E-Money Agent Status was effective

PSD Agent Effective date

Date from which the PSD Agent Status was effective

PSD Agent Status

Status as a PSD Agent

PSD / EMD Status

Status under the Payment Services Directive or the Electronic Money Directive

Status

Register Status for the firm /Authorised

Business Type

The type of the firm /Regulated

Organisation Name

Name of the firm

FRN

FCA Firm Reference Number

  

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