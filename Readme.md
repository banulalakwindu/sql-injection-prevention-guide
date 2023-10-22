# 🛡️ Web Security Lab with SQL Injection 🕵️‍♂️

## 🚀 Project Overview

This project aims to help students understand web security vulnerabilities, with a focus on SQL Injection, and learn how to mitigate these vulnerabilities.

## 📋 Prerequisites

- You should have a web server or a local development environment set up.
- A MySQL database server is required.

## 🏁 Getting Started

1. 📦 Create an SQL database named 'testdatabase'.
2. 📥 Import the provided 'testdatabase.sql' file into the 'testdatabase'.
3. 🌐 Host the PHP code on a web server or run it locally.
4. 🖥️ Access the web interface.
5. 👩‍💻 Try inputting 'user1' as the username and 'Password1' as the password and click 'Search'.
   - The interface should display user1's details in a table.
6. 🕵️‍♂️ Now, try inputting `' True- --` as the username and click 'Search'.
   - The interface will display details of all users, indicating SQL Injection vulnerability.
7. 🛡️ To mitigate SQL Injection, uncomment lines 52 and 53 in 'index.php' to sanitize user inputs:
   ```php
   $inputUsername = mysqli_real_escape_string($conn, $inputUsername);
   $inputPassword = mysqli_real_escape_string($conn, $inputPassword);
   ```
8. 🧹 Try inputting `' True- --` as the username and click 'Search' again.
   - This time, you won't be able to view all users' details, and the interface will show 'Not found'.

## 🤝 Conclusion

This project demonstrates the dangers of SQL Injection and how to mitigate it using techniques like parameterized queries and input validation. It highlights the importance of securing web applications against common security vulnerabilities. 🚀
