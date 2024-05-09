# Webapp-security
Class Assignment 3 - defense XSS and CSRF 
XSS defense:
-  Validate Input: add_students.php line 23-27, authenthicate.php line 14-18 
-  HTTP Headers to Restrict Script Execution: add_students.php line 8, authenthicate.php line 3,
-  Prepared Statements for SQL Queries: add_students.php line 24-28

CSRF defense:
-  Generate a CSRF token and store it in the session: add_students.php line 4
-  Include the CSRF token as a hidden field in the form: registeration.html line 88
-  Verify the CSRF token before processing the form data: add_students.php line 34-37

registeration.html : the student registeration page. the form secured with input validation. Register button leads to add_students.php

db_connect.html: validates the input again before adding it to the database

validation.js: also validates the from in registeration.html

loginform.html : the login page. the Login button sends the input to authenticate.php

authentication.php: authenthicate the input from loginform.html, creates session id, sends user to home

![image](https://github.com/afnnnnn/Webapp-security/assets/103879224/ef32dbc6-d855-4f15-ad28-a56225261916)


home.php: homepage

*registeration.html , db_connect.html  , validation.js is from assignment 1

