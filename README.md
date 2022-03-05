**GET EXTERNAL BOOK**
----
  Returns json data about an external book.

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
    number_of_pages=[integer]
    publisher=[string]
    release_date=[date]
   
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
    
    
**GET ALL BOOKS**
----
  Returns json data about all books.

* **URL**

  /api/v1/books

* **Method:**

  `GET`
  

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** 
    ```
    {
        "status_code":200,
        "status":"success",
        "data":[
            {
            "id":1,
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
            {
            "id":2,
            "name":"A Clash of Kings",
            "authors":[
                "George R. R. Martin"
            ],
            "number_of_pages":768,
            "publisher":"Bantam Books",
            "country":"United States",
            "release_date":"1999-02-02"
            }
          ]
        }

     ```
     
     If no results were found
     
     ```
        {
            "status_code":200,
            "status":"success",
            "data":[]
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
    
    
**UPDATE BOOK**
----
  Returns json data about a single book updated.

* **URL**

  /api/v1/books/:id
  
  where :id is a placeholder variable for an integer (for example 1)

* **Method:**

  `POST`
  
*  **SAMPLE REQUEST BODY**

   ```
    name=[string]
    isbn=[string]
    authors=[string]
    country=[string]
    number_of_pages=[integer]
    publisher=[string]
    release_date=[date]
   
   ```

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** 
    ```
        {
            "status_code":200,
            "status":"success",
            "message":"The book My First Book was updated successfully",
            "data":{
            "id":1,
            "name":"My First Updated Book",
            "isbn":"123-3213243567",
            "authors":[
            "John Doe"
            ],
            "number_of_pages":350,
            "publisher":"Acme Books Publishing",
            "country":"United States",
            "release_date":"2019-01-01"
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
    
    
**DELETE BOOK**
----
  Returns json data about a single book deleted.

* **URL**

  /api/v1/books/:id
  __________________
  /api/v1/books/:id/delete


where :id is a placeholder variable for an integer (for example 1)
* **Method:**

  `DELETE`
  `POST`
  
  For the above endpoints respectively

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** 
    ```
        {
            "status_code":204,
            "status":"success",
            "message":"The book ‘My first book’ was deleted successfully",
            "data":[]
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
    
    
**GET SINGLE BOOK**
----
  Returns json data about a single book.

* **URL**

  /api/v1/books/:id
  
  where :id is a placeholder variable for an integer (for example 1)

* **Method:**

  `GET`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** 
    ```
        {
            "status_code":200,
            "status":"success",
            "data":{
                "id":1,
                "name":"My First Book",
                "isbn":"123-3213243567",
                "authors":[
                    "John Doe"
                ],
                "number_of_pages":350,
                "publisher":"Acme Books Publishing",
                "country":"United States",
                "release_date":"2019-01-01"
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
    
    
**GET BOOKS FILTER**
----
  Returns json data about books with filter.

* **URL**

  /api/v1/books?
  
  *  **URL Params**

   **Required:**
 
   ```
    name=[string]
    country=[string]
    publisher=[string]
    release_date=[year(integer)]
   ```
   
 

* **Method:**

  `GET`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** 
    ```
        {
            "status_code":200,
            "status":"success",
            "data": [
                {
                    "id":1,
                    "name":"My First Book",
                    "isbn":"123-3213243567",
                    "authors":[
                        "John Doe"
                    ],
                    "number_of_pages":350,
                    "publisher":"Acme Books Publishing",
                    "country":"United States",
                    "release_date":"2019-01-01"
                }
            ]
        }
     ```
     
     If no results were found
     
     ```
        {
            "status_code":200,
            "status":"success",
            "data":[]
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
    
 
