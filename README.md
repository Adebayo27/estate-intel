**GET EXTERNAL BOOK**
----
  Returns json data about a single external book.

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
    ```
    {
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
    ```
    {
        "status_code": 404,
        "status": "not found",
        "data": []
    }
    ```
   

**CREATE BOOK**
----
  Returns json data about a single book created.

* **URL**

  /api/v1/books

* **Method:**

  `POST`
  
*  **SAMPLE REQUEST BODY**

   **Required:**
 
   ```
    name=[string]
    isbn=[string]
    authors=[string]
    country=[string]
    number_of_pages=[string]
    publisher=[string]
    release_date=[string]
   
   ```

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** 
    ```
    {
        "status_code":201,
        "status":"success",
        "data":{
            "book":{
            "name":"My First Book",
            "isbn":"123-3213243567",
            "authors":[
            "John Doe"
            ],
            "number_of_pages":350,
            "publisher":"Acme Books",
            "country":"United States",
            "release_date":"2019-08-01"
            }
        }
    }
     ```
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** 
    ```
    {
        "status_code": 404,
        "status": "not found",
        "data": []
    }
    ```
