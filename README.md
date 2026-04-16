# Railway Ticket Booking System with Priority-Based Allocation

<img width="1687" height="263" alt="image" src="https://github.com/user-attachments/assets/a3d1b3ee-4f9e-47ff-97f6-952f7fffd4bb" />
<img width="1649" height="934" alt="image" src="https://github.com/user-attachments/assets/ea0fcc3a-c6cc-4d48-b245-ca3ec0d81821" />
<img width="1891" height="655" alt="image" src="https://github.com/user-attachments/assets/aafce199-7672-4f76-89fd-339ec54ca7bc" />



## 1. Introduction

The Railway Ticket Booking System is a web-based application developed using PHP and MySQL that simulates the core functionalities of a real-world railway reservation system. The system allows users to book tickets, cancel reservations, and view booking details while implementing a basic priority-based allocation mechanism.

The primary objective of this project is to demonstrate how database management and server-side scripting can be integrated to build a functional reservation system. It also highlights the use of scheduling concepts such as First Come First Serve (FCFS) and waiting list management.

---

## 2. Objectives

- To design and develop a functional railway ticket booking system
- To implement ticket allocation and waiting list logic
- To demonstrate CRUD operations using PHP and MySQL
- To provide a simple user interface for booking and managing tickets
- To simulate real-world reservation scenarios in a simplified environment

---

## 3. Features

- Ticket booking for multiple passengers
- Automatic allocation of seats based on availability
- Waiting list handling when seats are full
- Ticket cancellation functionality
- Viewing all booked and pending tickets
- Modular PHP structure for better organization

---

## 4. System Architecture

The system follows a basic client-server architecture:

- Frontend: HTML forms and basic CSS for user interaction
- Backend: PHP scripts handling logic and database communication
- Database: MySQL for storing passenger and booking data

### Workflow:

1. User enters booking details through the interface
2. PHP processes the request and checks seat availability
3. If seats are available:
   - Ticket is confirmed
4. If seats are full:
   - Passenger is added to waiting list
5. Data is stored and retrieved from the MySQL database
6. User can view or cancel tickets as needed

---

## 5. File Structure
railway/
│── index.php # Entry point of the system
│── book.php # Handles ticket booking logic
│── cancel.php # Handles ticket cancellation
│── view.php # Displays booking details
│── allocate.php # Implements allocation logic
│── db.php # Database connection file
│── railway.sql # Database structure and data


Each file is responsible for a specific functionality, making the system modular and easier to maintain.

---

## 6. Technologies Used

- PHP (Server-side scripting)
- MySQL (Database management)
- HTML (Structure of web pages)
- CSS (Basic styling)

---

## 7. Key Concepts Implemented

- First Come First Serve (FCFS) scheduling
- Priority-based allocation
- Waiting list management
- CRUD operations (Create, Read, Update, Delete)
- Client-server interaction
- ## 8. Installation and Setup

Follow these steps to run the project locally:

### Prerequisites

- XAMPP or any local server environment
- Web browser (Chrome, Edge, etc.)
- Basic understanding of PHP and MySQL

### Steps

1. Download or clone the repository:

   git clone https://github.com/Anuj-km/railway-ticket-booking-system.git

2. Move the project folder to the XAMPP htdocs directory:

   C:\xampp\htdocs\railway

3. Start Apache and MySQL using the XAMPP Control Panel

4. Open phpMyAdmin:

   http://localhost/phpmyadmin

5. Create a new database:

   Name: railway

6. Import the database file:

   - Select the "railway" database
   - Click on "Import"
   - Choose the file: railway.sql
   - Click "Go"

7. Open the application in your browser:

   http://localhost/railway

---

## 9. Database Design

The system uses a MySQL database to store booking and passenger details.

### Key Components

- Passenger Information
- Booking Status (Confirmed / Waiting)
- Seat Allocation Details

### Example Table Structure

The database typically includes fields such as:

- Passenger ID
- Name
- Age
- Gender
- Booking Status
- Seat Number

### Functionality

- Stores all booking records
- Tracks seat availability
- Maintains waiting list entries
- Updates records upon cancellation

---

## 10. Working of the System

### Ticket Booking Process

1. User enters passenger details
2. The system checks seat availability
3. If seats are available:
   - A seat is assigned
   - Status is marked as "Confirmed"
4. If no seats are available:
   - Passenger is added to the waiting list
   - Status is marked as "Waiting"

### Allocation Logic

The allocation logic is implemented in the allocate.php file.

- Seats are assigned based on availability
- A simple priority mechanism ensures fair allocation
- When a ticket is canceled:
  - The first passenger in the waiting list is promoted

This approach reflects the concept of First Come First Serve (FCFS).

---

## 11. Ticket Cancellation

- Users can cancel booked tickets
- Upon cancellation:
  - The seat becomes available
  - Waiting list is updated
  - Next eligible passenger is moved to confirmed status

---

## 12. Viewing Bookings

- Users can view all bookings
- Displays:
  - Passenger details
  - Booking status
  - Seat allocation

This helps in tracking confirmed and waiting tickets efficiently.

---

## 13. Code Structure Explanation

### db.php
Handles database connection using MySQLi.

### index.php
Acts as the entry point and provides navigation.

### book.php
Processes booking requests and inserts data into the database.

### allocate.php
Implements the seat allocation and waiting list logic.

### cancel.php
Handles ticket cancellation and updates database records.

### view.php
Displays all booking data in a structured format.

---

## 14. Limitations

- No user authentication system
- Basic user interface
- No real-time seat tracking
- Designed for demonstration purposes only

---

## 15. Future Enhancements

- Add user login and authentication
- Improve UI/UX with modern frameworks
- Implement real-time seat availability
- Add online payment integration
- Deploy on a live server

---

## 16. Conclusion

This project demonstrates how a railway reservation system can be implemented using fundamental web development technologies. It successfully integrates database operations with server-side scripting while applying scheduling concepts such as FCFS and waiting list management.

The system provides a clear understanding of how real-world booking systems operate in a simplified and educational manner.

---

## 17. References

- PHP Official Documentation
- MySQL Documentation
- XAMPP Documentation
- Basic concepts from Operating Systems and DBMS
