<?php
// Database connection details
$servername = "localhost"; // Change if needed
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Database
$sql = "CREATE DATABASE IF NOT EXISTS HospitalReceptionistPotal";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}


// Select the Database
$conn->select_db("HospitalReceptionistPortal");

// Create Doctor Table
$sql = "CREATE TABLE IF NOT EXISTS Doctor (
    Doctor_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Specialty VARCHAR(100) NOT NULL,
    Doctor_Days VARCHAR(50) NOT NULL,
    Doctor_Time TIME NOT NULL,
    Amount DECIMAL(10, 2) NOT NULL
)";
if ($conn->query($sql) === false) {
    die("Error creating table 'Doctor': " . $conn->error);
}

// Insert Data into Doctor Table
$sql = "INSERT INTO doctor (Name, Specialty, Doctor_Days, Doctor_Time, Amount) VALUES
('Dr. John Smith', 'Cardiologist', 'Monday, Wednesday', '10:00:00', 1000.00),
('Dr. Sarah Johnson', 'Dermatologist', 'Tuesday, Thursday', '11:00:00', 1800.00),
('Dr. Emily Brown', 'Neurologist', 'Monday, Friday', '09:00:00', 1900.00),
('Dr. Michael Lee', 'Orthopedic', 'Wednesday, Saturday', '14:00:00', 2000.00),
('Dr. Olivia Davis', 'Rheumatologist', 'Tuesday, Thursday', '10:00:00',1500.00)";
if ($conn->query($sql) === false) {
    die("Error inserting data into table 'Doctor': " . $conn->error);
}

// Create Patient Table
$sql = "CREATE TABLE IF NOT EXISTS Patient (
    Patient_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Date_of_Birth DATE NOT NULL,
    Contact_Number VARCHAR(15) NOT NULL,
    Address TEXT NOT NULL
)";
if ($conn->query($sql) === false) {
    die("Error creating table 'Patient': " . $conn->error);
}

// Create Appointment Table
$sql = "CREATE TABLE IF NOT EXISTS Appointment (
    Appointment_ID INT AUTO_INCREMENT PRIMARY KEY,
    Appointment_Day VARCHAR(15) NOT NULL,
    Appointment_Time TIME NOT NULL,
    Patient_ID INT NOT NULL,
    Doctor_ID INT NOT NULL,
    FOREIGN KEY (Patient_ID) REFERENCES Patient(Patient_ID),
    FOREIGN KEY (Doctor_ID) REFERENCES Doctor(Doctor_ID)
)";
if ($conn->query($sql) === false) {
    die("Error creating table 'Appointment': " . $conn->error);
}

// Create Bill Table
$sql = "CREATE TABLE IF NOT EXISTS Bill (
    Bill_ID INT AUTO_INCREMENT PRIMARY KEY,
    Patient_ID INT NOT NULL,
    Bill_Date DATE NOT NULL,
    Amount DECIMAL(10, 2) NOT NULL,
    Appointment_ID INT NOT NULL,
    FOREIGN KEY (Patient_ID) REFERENCES Patient(Patient_ID),
    FOREIGN KEY (Appointment_ID) REFERENCES Appointment(Appointment_ID)
)";
if ($conn->query($sql) === false) {
    die("Error creating table 'Bill': " . $conn->error);
}

// Close connection
$conn->close();
?>
