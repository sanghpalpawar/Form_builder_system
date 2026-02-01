# Dynamic Form Builder System

A dynamic web-based form builder that allows an admin to create custom forms, share public form URLs, collect user responses, and view basic analytics. The system is built using PHP, MySQL, HTML, CSS, and JavaScript without hardcoded fields.

---

## Project Overview

This project demonstrates how dynamic forms can be created and managed without modifying backend code for every new form. An admin can define form fields, users can submit responses through a generated public URL, and submissions are stored and analyzed using a flexible JSON-based approach.

The project focuses on backend logic, database design, and secure data handling suitable for an internship-level assignment.

---

## Features

### Admin Side (No Login – Single Admin System)
- Create dynamic forms with custom fields
- Edit existing forms and modify fields
- Delete forms when no longer needed
- Add field types such as Text, Email, Number, and Gender (Male / Female / Other)
- Mark fields as required or optional
- View list of all created forms
- Access generated public form URLs
- View user submissions for each form
- Basic analytics (Total submissions, Male / Female / Other count)

### User Side
- Access form using a unique URL
- View form title and dynamically generated fields
- Client-side validation using JavaScript
- Submit responses securely

---

## Tech Stack

- Frontend: HTML, CSS, JavaScript
- Backend: PHP (mysqli)
- Database: MySQL
- Tools: VS Code, XAMPP, MySQL Workbench

---

## Database Design

### Tables Used
- forms – stores form metadata and structure (JSON)
- form_submissions – stores user responses linked to a form ID (JSON)

---
## Project Structure

```
form_builder_system/
├── admin/
│   ├── create-form.php
│   ├── edit-form.php
│   ├── deleteform.php
│   ├── forms-list.php
│   └── submissions.php
├── public/
│   ├── form.php
│   └── submit.php
├── config/
│   └── db.php
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── form-builder.js
├── database.sql
└── README.md
```


---

## Installation & Setup

1. Move the project folder to:
   C:/xampp/htdocs/

2. Start Apache and MySQL from XAMPP.

3. Open MySQL Workbench and run the database.sql file.

4. Update database credentials in config/db.php.

---

## How to Run the Project

### Create Form (Admin)
http://localhost/form_builder_system/admin/create-form.php

### View All Forms
http://localhost/form_builder_system/admin/forms-list.php

### Edit Form
http://localhost/form_builder_system/admin/edit-form.php?id=FORM_ID

### Delete Form
Use the Delete option from the forms list to remove a form.

### Public Form
http://localhost/form_builder_system/public/form.php?id=FORM_ID

### Submit Form
Form submissions are handled via:
http://localhost/form_builder_system/public/submit.php

### View Submissions & Analytics
http://localhost/form_builder_system/admin/submissions.php?id=FORM_ID

---

## Future Scope

- Implement admin authentication and login system
- Allow admins to manage all created forms from their personal profile
- Add role-based access for multiple admins
- Enhance analytics with charts and visual reports
- Add export options (CSV / Excel) for form responses

---

## Notes

- Authentication is intentionally excluded as the focus is on dynamic form creation
- The system is designed as a single-admin demo project
- Emphasis is on clean logic, database design, and security practices

---

## Author

Sanghpal Pawar  
Aspiring Web / Full-Stack Developer  
Skills: HTML, CSS, JavaScript, PHP,MySQL
