# Pastimes Clothing Store

### Overview
Pastimes Clothing Store is a web-based second-hand clothing marketplace developed using HTML, CSS, PHP, and MySQL. The application allows customers to browse clothing items, register accounts, log in, add products to a shopping cart, and complete purchases through a checkout system.

The website also includes administrative functionality that allows administrators to manage users and clothing products. Sellers can submit clothing items for approval before they are made available to customers.

## Authors
Sibongile Nhlapo – ST10449136
Tshifhiwa Austin Thamagane – ST10441732

### Target Users
The application is designed for:
* Customers looking to purchase affordable second-hand clothing.
* Sellers who wish to sell pre-owned clothing items.
* Administrators responsible for managing products, users, and transactions.

### Technologies Used
* HTML5
* CSS3
* PHP
* MySQL
* XAMPP/WAMP
* GitHub
* GitHub Actions
* Visual Studio Code

### Design Decisions
Several design decisions were made during the development of the website:
* A neutral colour scheme consisting of black, beige, and white was selected to create a modern clothing-store appearance.
* Navigation was placed at the top of the website to improve usability.
* Session management was used to maintain shopping cart information while users continue shopping.
* Database tables were used to store user accounts, clothing items, orders, and seller requests.
* Responsive layouts and simple navigation were implemented to improve user experience.

### System Features
Customer Features
* User Registration
* User Login
* Browse Clothing Items
* Add Items to Cart
* Increase and Decrease Cart Quantities
* Remove Items from Cart
* Continue Shopping
* Checkout Functionality
* Purchase History

### Administrator Features
* Administrator Login
* Add Clothing Items
* Edit Clothing Items
* Delete Clothing Items
* Manage User Accounts
* View Orders

### Seller Features
* Submit Clothing Item Requests
* Upload Clothing Information
* Submit Brand and Description Details

### Custom Features

Feature 1: Purchase History
Customers can view a history of their previous purchases. The report displays all orders and calculates the total amount spent.

Feature 2: Seller Clothing Requests
Sellers can submit requests to sell clothing items by providing item details, descriptions, and images. Administrators can review these requests before approval.

### Database Structure
The application uses the following tables:

* tblUser
* tblAdmin
* tblClothes
* tblOrder
* tblOrderLine
* tblSellerRequest
The database can be recreated using:
* `myClothingStore.sql`
* `loadClothingStore.php`
  
### Additional Files
* `userData.txt` – contains preloaded users
* `myClothingStore.sql` – exported database
* `loadClothingStore.php` – recreates database
  
### GitHub and GitHub Actions
GitHub was used for version control and collaboration between group members. All project files were stored within a shared repository.

GitHub Actions was used to automate repository workflows and support continuous integration practices. This helped maintain version control throughout the development process.

### Installation Instructions
1. Install XAMPP or WAMP.
2. Import the myClothingStore.sql database into phpMyAdmin.
3. Place the project folder inside the htdocs or www directory.
4. Start Apache and MySQL services.
5. Open the browser and navigate to:
6. Run the following to load the database:
`http://localhost/Pastimes/loadClothingStore.php`
7. Open the application in your browser:
`http://localhost/Pastimes/index.php`


## Login Details
### Admin
* Email: admin@pastimes.com
* Password: admin12345
## Users
* Username: john123
* Password: 12345678


## Conclusion

The Pastimes Clothing Store project successfully demonstrates the implementation of a second-hand clothing marketplace using web development technologies. The system provides functionality for customers, sellers, and administrators while maintaining an easy-to-use and visually appealing interface.
