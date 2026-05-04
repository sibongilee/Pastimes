# Pastimes Clothing Store

## Project Overview
Pastimes is a web-based application developed as part of the WEDE Part 2 project.  
The system allows users to register, log in, browse second-hand clothing, and add items to a cart.  
An admin is responsible for approving users before they can access the system.

---

## Authors
- Sibongile Nhlapo – ST10449136  
- Tshifhiwa Austin Thamagane – ST10441732  

---

## Technologies Used
- HTML  
- CSS  
- PHP (MySQLi)  
- phpMyAdmin (MySQL Database)  
- WAMP Server  
- Visual Studio Code  

---

## System Features

### User Features
- Register account (password must be 8 characters)  
- Login using username or email  
- Browse clothing items (Men and Women categories)  
- Add items to cart  
- View cart and total price  
- Remove items from cart  

---

### Admin Features
- Admin login  
- Approve users  
- Delete users  

---

### Store Features
- Display clothing with images and prices  
- Categorised into Men and Women  
- Cart functionality using sessions  

---

## Database Information
The database is named ClothingStore and includes the following tables:

- tblUser  
- tblAdmin  
- tblClothes  
- tblOrder  

The database can be recreated using:
- myClothingStore.sql  
- loadClothingStore.php  

---

## Additional Files
- userData.txt – contains preloaded users  
- myClothingStore.sql – exported database  
- loadClothingStore.php – recreates database  

---

## How to Run the Project

1. Start WAMP Server  
2. Open phpMyAdmin and create a database called:
   ClothingStore  
3. Place the project in:
   C:\wamp64\www\Pastimes  
4. Run:
   http://localhost/Pastimes/loadClothingStore.php  
5. Open:
   http://localhost/Pastimes/index.php  

---

## Login Details

### Admin
Email: admin@pastimes.com  
Password: admin12345  

### Users
Username: john123  
Password: 12345678  

---

## Demonstration
A video demonstration is included showing:
- Registration  
- Admin approval  
- Login  
- Product browsing  
- Add to cart  
- Cart functionality  

---

## Conclusion
The Pastimes system demonstrates full-stack development by combining frontend design, backend logic, and database management to create a functional e-commerce platform.