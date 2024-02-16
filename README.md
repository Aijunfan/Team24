# Team24 Sports Web Development Project
## Team members: Aijun Fan, Hao Zhang, Yilin Lai, Zheng Tian.
This project aims to create a dynamic and responsive e-commerce platform for sports equipment, focusing on user interaction and seamless product management.

## Explanation.
Due to the access to Stripe payment system, many parts of our project depend on Stripe's official packages, we don't have enough privileges to install the relevant packages on shell.hamk.fi, which will result in our project not being able to display properly on shell.hamk.fi.

## Table of Contents
- [Features](#features)
- [Database Tables](#database-tables)
- [Created Forms](#created-forms)
- [Created Tables](#created-tables)

## Features
Our project has developed a range of features to enhance user experience and provide robust functionality:

- **User Authentication:** Implements secure login and registration processes.
- **Product Listing:** Dynamically displays products, allowing users to browse based on categories such as Running, Football, Basketball, Hike, and Others.
- **Shopping Cart System:** Enables users to add items to their cart and checkout.
- **User Profile Management:** Users can view and edit their profiles.
- **Order Management:** Users can view their past orders and track the status of current orders.
- **Checkout:** Users can checkout make payment.
- **Product Management (Admin):** Admin users can add, edit, or delete products.
- **Database Interaction:** Includes creating, reading, updating, and deleting (CRUD) operations on the database.

### Detailed Features
- **User Authentication** - Yilin Lai
  - Code: [https://github.com/Aijunfan/Team24/blob/main/login.php]()
  - Code: [https://github.com/Aijunfan/Team24/blob/main/logout.php]()
  - Code: [https://github.com/Aijunfan/Team24/blob/main/join.php]()

- **User FeedBack** - Aijun Fan
    - Code: [https://github.com/Aijunfan/Team24/blob/main/feedback.php]()
    - Code: [https://github.com/Aijunfan/Team24/blob/main/feedbackprocess.php]()
- **Product Listing** - Hao Zhang
  - Code: [https://github.com/Aijunfan/Team24/blob/main/products.php]()
- **Product detail** - Hao Zhang
  - Code: [https://github.com/Aijunfan/Team24/blob/main/detail.php]()
- **Shopping Cart System** - Hao Zhang
  - Code: [https://github.com/Aijunfan/Team24/blob/main/cart.php]()
- **User Profile Management** - Hao Zhang
  - Code: [https://github.com/Aijunfan/Team24/blob/main/user_center.php]()
  - Code: [https://github.com/Aijunfan/Team24/blob/main/update_user_info.php]()
  - Code: [https://github.com/Aijunfan/Team24/blob/main/change_password.php]()
  - Code: [https://github.com/Aijunfan/Team24/blob/main/save_address.php]()
  - Code: [https://github.com/Aijunfan/Team24/blob/main/delete_address.php]()
- **Order Management** - Hao Zhang
  - Code: [https://github.com/Aijunfan/Team24/blob/main/orders.php]()
- **Product Management (Admin)** - Hao Zhang
  - Code: [https://github.com/Aijunfan/Team24/blob/main/upload_products.php]()

- **Payment Gateway** - Hao Zhang
  - Code: [https://github.com/Aijunfan/Team24/blob/main/checkout.php]()

## Database Tables
- **Users:** Stores user login and profile information.
- **Products:** Contains information about products.
- **ProductSizes:** Contains information about products Sizes info.
- **Orders:** Manages data on user orders.
- **OrderItems:** Tracks items within each order.
- **24_feedback:** user feedback info.
- **addresses:** user addresses info.
![image](https://github.com/Aijunfan/Team24/assets/127038124/8fe2ecf5-43d8-4f3e-bc4d-db86e875f1d6)

## Progress Tracking
- [x] User Authentication signup/login/logout
- [x] Product Listing 
- [x] Shopping Cart Implementation - add/delete/update product quantity and price
- [x]Payment Gateway Integration (TestMode) - use Stripe https://stripe.com/
- [x] User Profile Management - update user info/password, addresses CRUD 
- [x] Order Management - check/update order status  
- [x] Admin Product Management - upload data.json to database and use stripe Api to get products price_id.
