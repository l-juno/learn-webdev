# learn-webdev

## 1. HTTP (Hyper Text Transfer Protocol)
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
      2. DNS Resolution - before request reaches web server, broser performs DNS resolution to convery domain name to IP
      3. Server recieves request - request includes methods (GET, POST, etc.)
      4. Server Processing - involves retrieving static files or running server side scripts to generate dynamic content
      5. Database - if required, web server queries database
      6. Server Response + client recevies
   

## 2. DNS (Domain Name System)
  - DNS essentially is the proccess of translating humain friendly domain names to I.P addresses which machines use
  - I.P Address: internet protocol address which serves as an identification medium to allow devices to access the internet
  - DNS Query: Your computer sends a DNS query to a DNS server
  - DNS Resolver: The DNS resolver, part of the DNS server, checks its cache for the corresponding IP address.
    - If found in the cache, it returns the IP address immediately.
    - If not found, it proceeds to query other DNS servers.
  - network: a connection of two or more systems
  - Root DNS Servers: The query starts at the root servers, which are at the top of the DNS hierarchy
  - Top-Level Domain (TLD) Servers: Root servers direct the query to TLD servers (e.g., for .com, .org)
  - Client --DNS Query--> DNS Resolver --> Root Nameserver --> Top-Level Domain
