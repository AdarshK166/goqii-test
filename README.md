# React Project with PHP and SQL Backend

This project is a web application built with React for the frontend, and PHP and SQL for the backend.

## Prerequisites

Before you begin, ensure you have the following installed:

- Node.js and npm (Node Package Manager)
- PHP
- MySQL or any other SQL database server

## Installation

```bash
git clone https://github.com/AdarshK166/goqii-test.git
cd goqii-test
npm install
```

```bash
# Set up your SQL database and tables according to your project requirements.

# Create a database named `userdb` and a table named `users` with the specified fields:

CREATE DATABASE IF NOT EXISTS userdb;

USE userdb;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    dob DATE NOT NULL
);
```

```bash
# Set up your SQL database and tables according to your project requirements.
# Configure your PHP files in the `backend` directory to connect to your SQL database. Update the database credentials as needed.
```

## Running the Application

```bash
php -S localhost:8000 -t action 
```

Access the application in your web browser at [http://localhost:3000](http://localhost:3000).
