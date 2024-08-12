# learn-webdev

### 1. HTTP (Hyper Text Transfer Protocol)

- HTTP defines a set of rules for transferring data on the web. It dictates how messages are formatted and transmitted,
  and how web servers and browsers should respond to various commands.
- HTTP is a stateless protocol, meaning each request from a client to a server is treated as an independent transaction,
  unrelated to any previous request. This simplifies server design but requires additional mechanisms (like cookies) to
  maintain stateful information across multiple requests.
- HTTP uses server status codes
    - 1xx: Informational responses
    - 2xx: Successful responses (e.g., 200 OK)
    - 3xx: Redirection messages (e.g., 301 Moved Permanently)
    - 4xx: Client error responses (e.g., 404 Not Found)
    - 5xx: Server error responses (e.g., 500 Internal Server Error)
- The process
    1. Client Request - user enters URL and browser translates URL into HTTPS request and sends it to the web server
    2. DNS Resolution - before request reaches web server, browser performs DNS resolution to convert domain name to IP
    3. Server receives request - request includes methods (GET, POST, etc.)
    4. Server Processing - involves retrieving static files or running server side scripts to generate dynamic content
    5. Database - if required, web server queries database
    6. Server Response + client receives

### 2. DNS (Domain Name System)

- DNS essentially is the process of translating human friendly domain names to I.P addresses which machines use
- I.P Address: internet protocol address which serves as an identification medium to allow devices to access the
  internet
- DNS Query: Your computer sends a DNS query to a DNS server
- DNS Resolver: The DNS resolver, part of the DNS server, checks its cache for the corresponding IP address.
    - If found in the cache, it returns the IP address immediately.
    - If not found, it proceeds to query other DNS servers.
- network: a connection of two or more systems
- Root DNS Servers: The query starts at the root servers, which are at the top of the DNS hierarchy
- Top-Level Domain (TLD) Servers: Root servers direct the query to TLD servers (e.g., for .com, .org)
- Client --DNS Query--> DNS Resolver --> Root Nameserver --> Top-Level Domain

### 3. What is the internet? How does it differ from the web?

- Internet: a large network of computers which communicate together
- The web: a service in the internet which provides access to collection of resources. It uses HTTP for data
  transmission
- the web is consist of:
    - Web Pages: Documents formatted in HTML (HyperText Markup Language) that can include text, images, videos, and
      links
    - Website: A collection of web pages
    - Web Browsers: Software applications like Chrome, Firefox, Safari, and Edge that retrieve and display web pages
    - Web Servers: Computers that store and serve web pages to clients (browsers) upon request
- The web is a subset of the internet, specifically focusing on accessing and interacting with web pages and online
  content via web browsers

### 4. Learn basics of HTML, CSS, Javascript, and PHP

### 5. Install Docker

- Containers
    - provide a consistent environment for applications to run regardless of where they are deployed, ensuring that they
      behave the same on a developer's machine
    - lightweight, standalone, and executable software package that includes everything needed to run an application
- Images
    - Images are the building blocks of containers. They are built from a set of instructions written in a Dockerfile
- Dockerfile
    - a text file containing a series of instructions on how to build a Docker image
- using texteditor in terminal
    - "vi"
    -

### 6. Rename the IP address of my local domain to local.myproject.net

### 7. Use docker to create my own virtual environment

- Docker vs react (or other development server like React's built-in create-react-app server on localhost:3000)
    - React's development server (localhost:3000) is designed for local development and fast feedback, while Docker is
      used for consistent, isolated environments suitable for production
    - React runs on your local machine with dependencies installed locally, while Docker runs in a containerized
      environment, encapsulating all dependencies
    - In Docker, you explicitly map ports from the host to the container, while React's development server runs directly
      on a local port
    - Docker ensures the application runs consistently across different environments, whereas React's development server
      is tied to the local setup

### 8. Print "Hello World" on my local server

### 9. Use <form> to take user input and calculate simple math problems

### 10. Learn the difference between GET and POST in php

- GET:
    - appends data to the URL in the form of query parameters, hence the data sent via get is visible in the URL
    - white space translates to "+", so data is not sent word for word (aka. information is not sent exactly as it is)
    - limited to a maximum URL length which depends on the browser (1000-2000 characters)
    - less secure,
    - can be cached in browser
- POST:
    - sends data within the body of the HTTP request
    - no limit on data length
    - more secure for sensitive information because data is not exposed
    - not cached
    - information is sent exactly the way it is

### 11. Using google developer tools on the browser, just the basics :)

### 12. Ajax and jquery

- AJAX: Asynchronous JavaScript and XML. It is a web development techniques that allows web applications to send and
  retrieve data from a server asynchronously (in the background) without interfering with the display and behavior of
  the existing page
- jQuery: a javascript library designed to simplify client scripting of HTML
    - jQuery was invented because different browsers supported different code (all the browsers had different standards)
      and to unify all the behaviour in one code, jQuery was made for developers
- `$("#myResult").text(json.result)`
- `document.getElementById("myResult")`
- _**Note**_: "#" is used for id, "." is for class
-

### 13. More about <form>

    <form action="index.php" method="post" onSubmit="functionCall()">

- action is used to indicate which where the form data will be sent when submitted
    - "`./index.php`" vs "`index.php`"
        - "`index.php`" refers to the root index.php
        - "`./index.php`" refers to the relative index.php file to where this file is currently
- onSubmit - a call that runs when submit button is pressed.
- onSubmit vs Button
    - onSubmit: Form-level; handles the form's overall submission process
    - onClick: Button-level; handles specific button clicks
- Using return in the onsubmit attribute (`onsubmit="return validateForm()`") ensures that the result of the
  validateForm() function determines whether the form submission proceeds or is canceled

### 14. Using ajax

- syntaxes include `$("#nameButton").val("john") `
    - can also access elements by id on dev tools using `document.getElementById("nameButton").value = "Updated Text";`
      ```
      function mySubmit() {
          $.ajax({
              url: './ajax_calculator.php',
              type: 'post',
              cache: false,
              data: $('#myForm1').serialize(),
              dataType: 'json',
              beforeSend: function() {
    
              },
              complete: function() {
    
              },
              success	: function(json) {
                  if (json.result) {
                      $("#myResult").text(json.result)
                  }
    
              },
              error: function () {
    
              }
          });
      }
- url points to where the information of the form will be sent to
- complete is like `finally()` in the try catch of java
- success is like `try()` in the try catch of java
- error is like `catch()` in the try catch of java
- beforeSend is executed before the AJAX request is sent, allows you to add headers or change data

### 15. create login form!

- first i need to create a username and password to login (sign up), since i dont have a database connected to it
  currently, first i will store the information on the browser, once i get that working, i will connect a database to
  store the information
- Create a dictionary of accounts and then once pressed sign in, create username and password accordingly if possible.
  Used try catch here in php to catch any errors using jquery
- one problem i ran into is that i dont know how i can make different files share the same dictionary. Currently i have
  signup.php where username and password is created. Then user is redirected to login.php. now i dont know what to do to
  access only the information i need in accounts.php
- To solve this problem i decided that i need a database to store the usernames and passwords. Therefore, i just hard
  coded a username and password to login in and use `document.location.href` to relocate to new page once login was
  successful or return a error message if something went wrong
- relearn `onsubmit = login(); return false`, the return false is critical in many aspects. when I used a button to call
  the ajax call, the form was submitted earlier than the ajax return value so the page wasnt working like intended.

#### cookies

- once login is successful, now i want to store the login information in the browser using cookies
- cookies are small pieces of data in a website that stores user's information for increase functionality, enhance user
  experience, and track user behaviour
- cookies are often encrypted and then decrypted in the server when data is sent
- cookies in javascript and cookies in php are the same thing.

  ```<?php
  // Set a cookie named "username" with the value "JohnDoe"
  setcookie("username", "JohnDoe", time() + (86400 * 7), "/"); // 86400 = 1 day, so this sets the cookie for 7 days
  // Redirect to another page or show a message
  echo "Cookie 'username' has been set!";
  ?>
  <?php
  // Check if the cookie "username" is set
  if (isset($_COOKIE['username'])) {
  echo "Welcome back, " . $_COOKIE['username'] . "!";
  } else {
  echo "Hello, new visitor!";
  }
  ?>

- `$_COOKIE` is a global array to access the cookies.
- cookies store information in key-value pairs

#### sessions vs cookies

- cookies:
    - client-side storage
    - cookies can persist across sessions because it remains with time
    - size limit of around 4kb per cookie
    - can be accessed and modified by the client
- sessions
    - server-side storage
    - persistence: typically temporary and last only as the user is active. ends when browser is closed
    - size limit is constrained by the server's storage
    - server controls and manages data, making it inaccessible to the client directly

### 16. databases

- organized, structured, collection of information related in different ways
- relational vs non-relational databases
    - **relational** (SQL)
        - organize data into one or more tables
        - each table has columns and rows
        - a unique key identifies each row
    - **non-relational** (noSQL)
        - orgainize data in anything but a traditional table
        - key-value stores
        - documents (json, xml)
        - graphs
        - flexible tables
    
  - **Database Management systems** (DBMS)
    - a program that controls the creation, manipulation and maintenance of a database
  - **Relational Database Management system** (RDBMS)
    - stores data into a collection of tables which they relate by common fields between the columns of the tables
- Attributes
  - **PRIMARY KEY**: a key used by one or more columns to uniquely identify each row in the database
  - **FOREIGN KEY**: a primary key of a given table that is used in another table to ensure the referential integrity of the data such that the value from another table matches with the intended one
  - **NOT NULL**: constraint to make sure a column in a row is not left empty
  - **UNIQUE**: constraint to make sure a column in a row is unique to itself 
  - **DEFAULT**: Sets a default value for a column if none is provided. 
  - **INDEX**: Improves the speed of data retrieval from the table by creating an index on specified columns.
- datatypes 
  - **INT**: Integer type, for whole numbers. 
  - **UNSIGNED**: positive whole numbers
  - **VARCHAR(n)**: Variable-length string with a maximum length of n. 
  - **CHAR(n)**: Fixed-length string with a length of n. 
  - **TEXT**: Variable-length string for longer text data. 
  - **DATE**: For date values (YYYY-MM-DD). 
  - **DATETIME**: For date and time values (YYYY-MM-DD HH:MM:SS). 
  - **TIMESTAMP**: For date and time, automatically updated when the record is modified. 
  - **FLOAT, DOUBLE**: For floating-point numbers. 
  - **DECIMAL(m, d)**: Fixed-point number where m is the total number of digits and d is the number of digits after the decimal point. 
  - **BOOLEAN**: Represents a boolean value (TRUE or FALSE).
  - **CURRENT_TIMESTAMP**: automatically sets the column's value to the current date and time when a new record is inserted


### 17. create my own database server on docker

- by editing the docker-compose.yml file (specifying rootpassword, database name, myuser, and mypassword) under the
  docker root, and creating the mysql container, I was successfully able to create my first database server
```
<?php
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
```
- after connecting to the database, now create my first table on the database to store username and password
- In this table called users, i will store username, password, user_id (primary key), when created
- in the datagrip console use 

```
CREATE TABLE users
(
    user_no INT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT 'unique user number',
    user_id VARCHAR(32)  NOT NULL COMMENT 'user_id for login',
    user_pw VARCHAR(255) NOT NULL COMMENT 'user_pw for login, encrypted',
    user_name VARCHAR(32) NOT NULL COMMENT 'Name of the user',
    user_email VARCHAR(128) NOT NULL COMMENT 'email of the user',
    rt      DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'registered time',
    last_login_date DATETIME DEFAULT NULL COMMENT 'last login date',
    key `idx_user_id` (user_id),
    UNIQUE key `uk_user_id` (user_id)
);

CREATE TABLE login_log (
    log_no BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT COMMENT 'pk',
    user_no INT UNSIGNED NOT NULL COMMENT 'user number',
    user_id VARCHAR(32) NOT NULL COMMENT 'user_id for login',
    ip VARCHAR(16) NOT NULL COMMENT 'ip',
    rt DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'login date',
    key `idx_user_no` (user_no),
    key `idx_ip` (ip)

);
```

### 18. store users on database
- Now on sign up form, you can call a function to store username, email, password on the database
- when storing password, for security, password should be stored encrypted. by using `password_hash(user_pw, PASSWORD_DEFAULT);` you can store an encrypted password on the database. PASSWORD_DEFAULT is an algorithm from php to encrypt password
- when sending queries to the database, a typical way is to store query as a string, then sending the variable as a query
```
$sql = "INSERT INTO users (user_id, user_pw, user_email, user_name)
        VALUES ('$user_id', '$user_pw', '$user_email', '$user_name')";

if ($conn->query($sql) === TRUE) {
    $response["result"] = "success";
} else {
    $response["result"] = "fail";
    $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
}
```
- always remember to close the connection
- use network on the browser developer tools to check how each query returns and debug

### 19. login
- after storing the user information on the database, redirect the user to the login page
- at any point if something is false from the database, add error message on the response array and return. print the error message to the client
- now once the user logs in, check if the user exists in the database first
- then check if user_id and user_pw matches
  - this is done by using php's built in `password_verify($user_pw, $row['user_pw'])` since password was encrypted using `password_hash()`
- if it matches add result to the response array and insert log into login_log
- then, set a cookie to store the user's valid login time such that user can stay logged in
- update last_login_date in users table using 
```
$sql = "UPDATE users 
SET last_login_date = NOW() 
WHERE user_id = '{$user_id}'";
```
- return response array to client, redirect to main page once client recieves valid response
- on main.php, check if cookie is made. since cookies are sent along with the response from ajax, the cookie should be made once recieved right away.
```
<?php
if (!isset($_COOKIE['user_id'])) {
    redirect("./login.php");
    return;
}
echo "hi~ ". $_COOKIE['user_name'];
```

### 20. Clean up code
- since functionality is working the way I want, in terms of logging in and signing up, gather common code such as connection to database, or login checking by seeing if there is a cookie, move those code to another file and use the `require` keyword to add the code to the file

### 21. User list 
- display the list of users on the client screen and make functionality to filter the users based on some characteristic
  - initially i set it up such that i could only filter one thing at a time. After coding this, i realized that this method is ineffective as some people would want to filter many things
  - therefore, i will change the code to show all things to filter







    