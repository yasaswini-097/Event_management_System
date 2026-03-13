To add your **Event Management System project README to GitHub**, you should create a file named **`README.md`** in your project folder. Below is a **GitHub-friendly README (Markdown format)** that will look clean and professional on GitHub.

---

#  Event Management System

##  Project Overview

The **Event Management System** is a web-based application developed to simplify the process of managing and booking events. The system allows administrators to create, update, and manage events, while users can register, log in, view events, and book them easily.

This project is built using **PHP, MySQL, HTML, and CSS** and runs on a **local server using XAMPP**. It provides a simple and user-friendly interface for both administrators and users to interact with the system.

---

#  Features

##  Admin Features

* Admin login authentication
* Create new events
* Edit event details
* Delete events
* View total events
* View user bookings
* Manage event information (price, manager name, contact)

##  User Features

* User registration
* User login
* View available events
* Search events by title or location
* Book events
* View booking history

---

# 🛠 Technologies Used

### Frontend

* HTML
* CSS

### Backend

* PHP

### Database

* MySQL

### Development Tools

* XAMPP
* Visual Studio Code

---

# 📂 Project Structure

```
events_managements/
│
├── index.php
├── user_register.php
├── user_login.php
├── user_dashboard.php
├── user_bookings.php
├── book_event.php
│
├── admin_login.php
├── admin_dashboard.php
├── create_event.php
├── edit_event.php
├── delete_event.php
├── view_bookings.php
│
├── logout.php
└── README.md
```

---

# Database Setup

Create a database named:

```
events_managements1
```

### Users Table

```sql
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100),
password VARCHAR(100)
);
```

### Admin Table

```sql
CREATE TABLE admin (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50),
password VARCHAR(50)
);

INSERT INTO admin(username,password)
VALUES ('admin','admin123');
```

### Events Table

```sql
CREATE TABLE events (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(200),
description TEXT,
event_date DATE,
location VARCHAR(200),
price INT,
manager_name VARCHAR(100),
manager_mobile VARCHAR(15)
);
```

### Bookings Table

```sql
CREATE TABLE bookings (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
event_id INT,
booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```



#  Installation Guide

1️⃣ Install **XAMPP** on your system
2️⃣ Start **Apache** and **MySQL** from XAMPP Control Panel
3️⃣ Open **phpMyAdmin**
4️⃣ Create a database named `events_managements1`
5️⃣ Import or run the SQL queries to create tables
6️⃣ Copy the project folder to:

```
C:\xampp\htdocs\
```

7️⃣ Open your browser and run:

```
http://localhost/events_managements/
```



# System Workflow

1. Admin logs into the system.
2. Admin creates and manages events.
3. Events are stored in the database.
4. Users register and log into the system.
5. Users browse available events.
6. Users book events.
7. Booking details are stored in the database.
8. Admin can view all bookings.



# 🔒 Security

* Session-based login authentication
* Restricted access for admin and user panels
* Input sanitization for database queries



#  Future Enhancements

* Online payment gateway integration
* Email notification system
* Event poster/image upload
* Seat limit management for events
* Mobile application support
* Advanced search filters
* Event feedback and rating system



#  Conclusion

The **Event Management System** provides a simple and efficient platform for managing events and bookings online. It reduces manual effort, improves event organization, and provides a convenient system for both administrators and users.



✅ **Author:** Yasaswini Vanukuri
🎓 **Project Type:** Mini Project
💻 **Technology:** PHP | MySQL | HTML | CSS

