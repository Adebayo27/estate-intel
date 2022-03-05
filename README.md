**GET EXTERNAl BOOK**
----
  Returns json data about a single user.

* **URL**

  /api/external-books?name=:nameOfABook

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `name=[string]`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** 
    ```{
        "status_code":200,
        "status":"success",
        "data":[
            {
            "name":"A Game of Thrones",
            "isbn":"978-0553103540",
            "authors":[
                "George R. R. Martin"
            ],
            "number_of_pages":694,
            "publisher":"Bantam Books",
            "country":"United States",
            "release_date":"1996-08-01"
            },
        ]
     }
     ```
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** 
    ```{
        "status_code": 404,
        "status": "not found",
        "data": []
    }
    ```
