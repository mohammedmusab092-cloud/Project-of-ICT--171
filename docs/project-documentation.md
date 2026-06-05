
ICT171 Project Documentation: ZestraFit
Student Name: Muhammad Musab Qasir

Student Number: 35991305

Unit: ICT171 – Introduction to Server Environments and Architectures

Live Site: https://zestra.fun

Repository: Project-of-ICT--171

1. Executive Summary
ZestraFit is a cloud-hosted fitness tracking platform developed to demonstrate proficiency in cloud infrastructure, server administration, and secure web deployment. Hosted on Microsoft Azure, the platform utilizes an Ubuntu Linux environment managed via an Nginx web server. The project transitions a static concept into a dynamic, multi-purpose cloud application featuring secure user authentication, database persistence via SQLite, and verified SSL/TLS encryption.

2. System Architecture & Environment
The project follows a standard N-tier architecture deployed within a cloud environment:

Cloud Provider: Microsoft Azure (Virtual Machine)

Operating System: Ubuntu 22.04 LTS (Linux)

Web Server: Nginx (configured as a reverse proxy/web server)

Runtime Environment: PHP 8.x

Database Layer: SQLite (File-based relational database)

Network Layer: DNS (A records) configured for zestra.fun with HTTPS enforced via Port 443.

3. Implementation Details
3.1 Server Administration
The Linux environment was configured through a remote CLI. Key administrative tasks included:

User Permissions: Setting directory ownership for www-data.

Nginx Configuration: Writing server blocks to handle PHP processing and domain routing.


3.2 Security & Encryption
To ensure data integrity and user privacy:

SSL/TLS: Certificates were deployed to enable HTTPS, encrypting data in transit.


3.3 Application Features
Authentication: Fully functional Register/Login/Logout flow.

Tracking: CRUD operations for workouts, water intake, BMI, and steps.

Diagnostics: A custom Server Status Dashboard providing real-time telemetry (Uptime, Disk Usage, PHP Version).

4. Learning Outcomes Demonstrated
Cloud Deployment: Provisioning and scaling resources in Azure.

Server Management: Navigating the Linux filesystem and managing services.

Web Architecture: Understanding the handshake between DNS, Web Servers, and Browsers.

Database Integration: Designing schemas and managing data flow in a server-side environment.

5. Licensing
The software and documentation for ZestraFit are released under the following license:

MIT License

Copyright (c) 2026 Muhammad Musab Qasir

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

6. Generative AI Statement
Generative AI tools were utilized for troubleshooting server configurations, brainstorming UI layouts, and drafting initial documentation outlines. All resulting code and configurations were manually reviewed, tested for security vulnerabilities, and deployed by the student to ensure compliance with ICT171 unit standards.
