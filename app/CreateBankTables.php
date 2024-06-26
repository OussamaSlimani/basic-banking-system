<?php
$conn = mysqli_connect('localhost', 'root', '', 'flare_bank');
if (!$conn) {
     die("Could not connect to the database due to the following error --> " . mysqli_connect_error());
}

// Create users table
$createUsersTable = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    balance DECIMAL(10,2) NOT NULL CHECK (balance >= 0)
)";
if (mysqli_query($conn, $createUsersTable)) {
     echo "Users table created successfully<br>";
} else {
     echo "Error creating users table: " . mysqli_error($conn) . "<br>";
}

// Create transaction table
$createTransactionTable = "
CREATE TABLE IF NOT EXISTS transaction (
    sno INT AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(100) NOT NULL,
    receiver VARCHAR(100) NOT NULL,
    balance DECIMAL(10,2) NOT NULL CHECK (balance >= 0),
    datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (mysqli_query($conn, $createTransactionTable)) {
     echo "Transaction table created successfully<br>";
} else {
     echo "Error creating transaction table: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
