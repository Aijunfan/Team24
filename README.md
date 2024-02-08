
# Project Name - Team 24 

## Team members: Aijun Fan, Hao Zhang, Yilin Lai, Zheng Tian.

This is a shopping site that showcases different types of shoes.

Table of Contents
Features
Database Tables
Created Forms

Features

In this section, list and describe the features or functionality that you are working on. You can use checkboxes to track the progress of each feature.

 Feature 1 (Yilin Lai): Customer sign in / sign up
 Feature 2 (Hao Zhang): Product list table
 Feature 3 (Aijun Fan): Suggestion and feedback table
 Feature 4 (Zheng Tian): Shop infor table




Product list table:
CREATE TABLE Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    info TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
ProductSizes list table:
CREATE TABLE ProductSizes (
    size_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    size VARCHAR(10) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
);






Feature 1
Sign in / Sign up

Include more detailed information about Feature 1 here. Provide links to related code files (github) & link to the feature (shell.hamk.fi) .

Feature 2
Include more detailed information about Feature 2 here. Provide links to related code files (github) & link to the feature (shell.hamk.fi) .

Feature 3
Set up an interface to collect customer feedback and suggestions with forms such as ID, email or phone number, topic, content, etc.
Provide links to related code files (github) & link to the feature (shell.hamk.fi) .

Database Tables
List the database tables that are part of your project.

Table 1 (Created By): Table Name
Table 2 (Created By): Table Name
Table 3 (Created By): Table Name
Include the ER Diagram of the database.

Created Forms
List and describe any forms that have been created as part of your project. Include details about the purpose of each form and any validation logic.

Form 1 (Created By): Form Name: Link to the related code file (github) | Link to the form (shell.hamk.fi). | Validations Applied
Form 2: (Created By): Form Name: Link to the related code file (github) | Link to the form (shell.hamk.fi). | Validations Applied
Form 3: (Created By): Form Name: Link to the related code file (github) | Link to the form (shell.hamk.fi). | Validations Applied
Created Tables
List any tables that you have created in the project work

Table 1 (Created By): Table Name | Link to the related code file (github) | Link to the table (shell.hamk.fi).
Table 2 (Created By): Table Name | Link to the related code file (github) | Link to the table (shell.hamk.fi).
Table 3 (Created By): Table Name | Link to the related code file (github) | Link to the table (shell.hamk.fi).
