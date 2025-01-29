# Hospital Receptionist Management System (HRMS)

## Introduction
The Hospital Receptionist Management System (HRMS) is a web-based application designed to streamline hospital operations, focusing on patient management, appointment scheduling, billing, and doctor management. This system is developed using PHP, MySQL, and HTML/CSS to provide an efficient and user-friendly experience for hospital staff and patients.

## System Overview
The HRMS consists of several key components:
- **Patient Management**: Enables registration of new patients and management of existing patient records.
- **Appointment Scheduling**: Facilitates booking, updating, and deleting doctor appointments.
- **Billing System**: Generates bills based on appointments and doctor fees.
- **Doctor Management**: Displays a list of doctors, including their specialties and availability.

## File Structure
The system is organized into multiple files, each serving a specific purpose:

### Database Setup
- **data.php**: Creates the database and necessary tables (Doctor, Patient, Appointment, Bill) if they do not exist.

### Database Connection
- **hospital_database.php**: Establishes a connection to the MySQL database.

### Patient Management
- **appointment.php**: Handles patient registration and appointment booking.
- **delete_appointment.php**: Manages the deletion of appointments and associated bills.
- **form.php**: Provides the main interface for patient management, including forms for new and existing patients.

### Billing
- **bill.php**: Displays the billing details for appointments.

### Doctor Management
- **doctor.php**: Lists all doctors and their details.

### User Authentication
- Future enhancements may include user authentication functionality.

### Styling and Scripts
- **form.css**: Contains styles for the forms and overall layout.
- **style.css**: Defines styles for the login page and other components.

## Key Features
- **Patient Registration**: Allows new patients to register by providing personal details stored in the database.
- **Appointment Booking**: Enables patients to book appointments with doctors, with automatic billing calculations based on doctor fees.
- **Bill Generation**: Generates and displays bills after an appointment.
- **Doctor List**: Provides a comprehensive list of doctors, including their specialties and availability.
- **Responsive Design**: Ensures a user-friendly experience across different devices.

## Database Design
The database consists of the following tables:
- **Doctor**: Stores information about doctors (ID, name, specialty, availability, fees).
- **Patient**: Contains patient details (ID, name, date of birth, contact number, address).
- **Appointment**: Links patients to doctors and stores appointment details (day, time).
- **Bill**: Records billing information related to appointments.

## Challenges Faced
- **Database Integration**: Ensuring seamless interaction between PHP scripts and the MySQL database required careful planning and testing.
- **User Interface Design**: Creating a functional and visually appealing user interface was a key focus area.

## Conclusion
The Hospital Receptionist Management System provides a comprehensive solution for managing hospital operations efficiently. It enhances the patient experience through streamlined processes and effective management of appointments and billing. Future improvements could include online appointment scheduling and patient feedback systems.

## References
- **PHP Documentation**: [php.net](https://www.php.net/)
- **MySQL Documentation**: [mysql.com](https://www.mysql.com/)
- **HTML/CSS Resources**: [w3schools.com](https://www.w3schools.com/)

## How to Run the Project Locally
### Prerequisites
- A local server environment (e.g., XAMPP, WAMP, or MAMP).
- A web browser.
- PHP (v7.4 or later) and MySQL installed.

### Steps
1. **Download the Project**
   - Download the project files as a ZIP or clone the repository.

2. **Set Up Local Server**
   - Install and start XAMPP/WAMP/MAMP.
   - Ensure Apache and MySQL modules are running.

3. **Place Files**
   - Copy the project folder into the `htdocs` directory (for XAMPP) or the respective folder for your server.

4. **Database Configuration**
   - Open phpMyAdmin via your local server (e.g., `http://localhost/phpmyadmin`).
   - Create a database named `hospital_management`.
   - Import the `data.php` file to set up tables and initial data.

5. **Modify Database Connection**
   - Open `hospital_database.php`.
   - Ensure the database credentials match your server setup.

6. **Run the Project**
   - Open a web browser.
   - Navigate to `http://localhost/Hospital_Receptionist_Management_System/form.php`.

This README provides a structured overview of the Hospital Receptionist Management System, including its features, database structure, and setup instructions for local deployment.

