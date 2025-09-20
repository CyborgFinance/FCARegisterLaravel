# Home

Firm Address API

  

DETAILS

#### Get information about a specific firm using its Firm Reference Number

  

GET End Point URL

/V0.1/Firm/<FRN>/Address

  

cURL (example)

  

curl -X GET "[https://register.fca.org.uk/services/V0.1/Firm/482398/Address](https://register.fca.org.uk/services/V0.1/Firm/482398/Address)" 
     -H "x-auth-email: [user@example.com](mailto:user@example.com)" \\
     -H "x-auth-key: c2547eb745079dac9320b638f5e225cf483cc5cfdda41" 
     -H "Content-Type: application/json"

  

Response (example)

  

{  
    "Status": "FSR-API-02-02-00",  
    "ResultInfo": {  
        "page": "1",  
        "per\_page": "2",  
        "total\_count": "2"  
    },  
    "Message": "Ok. Firm Address Found",  
    "Data": \[  
        {  
            "URL": "[https://register.fca.org.uk/services/V0.1/Firm/999001/Address?Type=PPOB](https://register.fca.org.uk/services/V0.1/Firm/999001/Address?Type=PPOB)",  
            "Website Address": "[https://www.fca.org.uk/](https://www.fca.org.uk/)",  
            "Phone Number": "4470799999999",  
            "Country": "UNITED KINGDOM",  
            "Postcode": "E20 1JN",  
            "County": "London",  
            "Town": "Town",  
            "Address Line 4": "Address Line 4",  
            "Address Line 3": "Address Line 3",  
            "Address Line 2": "Address Line 2",  
            "Address Line 1": "Address Line 1",  
            "Address Type": "Principal Place of Business"  
        },   
        {  
            "URL": "[https://register.fca.org.uk/services/V0.1/Firm/999001/Address?Type=Complaint](https://register.fca.org.uk/services/V0.1/Firm/999001/Address?Type=Complaint)",  
            "Website Address": "[https://www.fca.org.uk/](https://www.fca.org.uk/)",  
            "Phone Number": "442079999999",  
            "Country": "UNITED KINGDOM",  
            "Postcode": "E20 1JN",  
            "County": "London",  
            "Town": "Town",  
            "Address Line 4": "Complaints Address Line 4",  
            "Address Line 3": "Complaints Address Line 3",  
            "Address Line 2": "Complaints Address Line 2",  
            "Address Line 1": "Complaints Address Line 1",  
            "Address Type": "Complaints Contact"  
        }  
    \]  
}

  

Object Definition

  

Data

  

The firm data is presented in the Data Object returned in the response

Name

Description /example

Address Line 1

The first line of the address

Address Line 2

The second line of the address

Address Line 3

The third line of the address

Address Line 4

The fourth line of the address

Town

The town of the address

County

The county of the address

Country

The country of the address

Postcode

The postcode of the address

Website Address

Website address, if any, for the location

Phone Number

Phone, if any, for the location

Contact Name

In case of Complaints Contact address, the contact persons name will be returned

Address Type

Type of address

URL

URL to fetch the specific address

  

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

FSR-API-02-02-00

SUCCESS : Address Found

FSR-API-02-02-11

Bad Request : Invalid Input

FSR-API-02-02-21

ERROR : Account Not Found

FSR-API-01-01-11

Unauthorised: Please include a valid API key and Email address