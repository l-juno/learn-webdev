# learn-webdev

### 1. HTTP (Hyper Text Transfer Protocol)
  - HTTP defines a set of rules for transferring data on the web. It dictates how messages are formatted and transmitted, and how web servers and browsers should respond to various commands.
  - HTTP is a stateless protocol, meaning each request from a client to a server is treated as an independent transaction, unrelated to any previous request. This simplifies server design but requires additional mechanisms (like cookies) to maintain stateful information across multiple requests.
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
  - I.P Address: internet protocol address which serves as an identification medium to allow devices to access the internet
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
  - The web: a service in the internet which provides access to collection of resources. It uses HTTP for data transmission
  - the web is consist of:
     - Web Pages: Documents formatted in HTML (HyperText Markup Language) that can include text, images, videos, and links 
     - Website: A collection of web pages
     - Web Browsers: Software applications like Chrome, Firefox, Safari, and Edge that retrieve and display web pages 
     - Web Servers: Computers that store and serve web pages to clients (browsers) upon request
  - The web is a subset of the internet, specifically focusing on accessing and interacting with web pages and online content via web browsers

### 4. Learn basics of HTML, CSS, Javascript, and PHP

### 5. Create my own virtual environment using Docker

### 6. Rename the IP address of my local domain to local.myproject.net 

### 7. Print "Hello World" on my local server

### 8. Use <form> to take user input and calculate simple math problems

### 9. Learn the difference between GET and POST in php
  - GET:
      - appends data to the URL in the form of query parameters, hence the data sent via get is visible in the URL
      - white space translates to "+", so data is not sent word for word
      - limited to a maximum URL length which depends on the browser (1000-2000 characters)
      - less secure,
      - can be cached in browser
  - POST:
      - sends data within the body of the HTTP request
      - no limit on data length
      - more secure for sensitive information because data is not exposed
      - not cached

### 10. Using google developer tools on the browser, just the basics :)

### 11. Ajax and jquery
  - AJAX: Asynchronous JavaScript and XML. It is a web development techniques that allows web applications to send and retrieve data from a server asynchronously (in the background) without interfering with the display and behavior of the existing page
  - jQuery: a javascript library designed to simplify client scripting of HTML
      - jQuery was invented because different browsers supported different code (all the browsers had different standards) and to unify all the behaviour in one code, jQuery was made for developers
  - $("#myResult").text(json.result)
  - document.getElementById("myResult")
  - _**Note**_: "#" is used for id, "." is for class
  - 

### 11. More about <form>
    <form action="index.php" method="post" onSubmit="functionCall()">
  - action is used to indicate which where the form data will be sent when submitted
     - "./index.php" vs "index.php"
        - "index.php" refers to the root index.php 
        - "./index.php" refers to the relative index.php file to where this file is currently
  - onSubmit - a call that runs when submit button is pressed.

    