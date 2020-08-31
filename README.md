# Mediquik


## Hardware Specifications

- Pentium IV or above
- Memory : 520 MB
- Display : Colour monitor
- Keyboard : Windows Compatible
- Mouse : Windows Compatible


## Software Specifications

	
### Server Side

- Front end			:PHP, HTML, CSS, JAVA SCRIPT
- IDE				:Xampp
- Back end			:PHP,MySQL
- Operating System 	:Windows
- Web Server		:Apache

### Client Side

- Operating System	:Windows
- Software Packages	:Web Browser


## Installation


### XAMPP

- Download and install [XAMPP](https://www.apachefriends.org/download.html). 
- Clone the repository and paste the directory 'Mediquik' in your installed XAMPP directory.
- Paste the directory 'medi' on your 'xampp/mysql/data' directory.  

### Running Apache and MySQL

- Run XAMPP.
- Click on the start buttons next to Apache and MySQL. 
- Now you should be able to access the web application when you visit - [Mediquik](http://localhost/Mediquik/).
- You may also access the tables contained within the medi directory when you click - [Database](http://localhost/phpmyadmin/), or on the admin button next to MySQL in the XAMPP window.
- Before exploring the web application finish reading this file.


## Description

**Mediquik (Online Medical Calculator and Diagnostic Lab)** was created in order to allow users to register for online lab tests, and compute results associated with a set of medical calculators. The tests will be taken, recorded and the results updated in the web application by a lab technician. The results from each of the medical calculators can be calculated immedeately by the user.


## Purpose

- Designed in order to solve the real world problem of inaccessibility
- Manual system is tedious and time consuming for users.
- Users travel to hospitals, have to deal with lots of paperwork and stand in queues.
- Manual system undesirable for senior citizens and physically challanged people. 


## Assumptions

- Registering Users are users who require or desire medical tests of their choice to be conducted on them.
- Lab technicians have sent their Resume/CV to the admin of the web application to be selected or added.
- Lab technicians have arranged for the tests to be conducted for the users and will record them.
- Lab intventory items can be ordered and will arrive in 5 days.
- Orders can be cancelled	


## Users


### Regular Users

All users can check out the web application, register for an account. Regular users visiting the web application may check out the various medical calculators available and perform calculations. They cannot however, view the online diagnostic lab tests as they aren't registered users.

### Registered Users

These users are the users who have registered an account with mediquik. They can access all tests - lab tests and calculators and the results from each of those tests will be recorded and displayed in another page from which they can select and generate reports

### Lab Technicians

These users, arrange for the tests to be conducted, record these tests and updates the web application by entering the test results for the respective user. These users can't sign up through the portal, they will have to send their Resume/CVs and communicate to the admin and the admin will add them accordingly.

### Admin

The Admin has the potential to add/remove lab technicians, remove users and view the site report.
In order to login as the admin, go to the Log in page and enter the following credentials - 

**Username: admin**
<br>
**Password: 9596**



## Database Design


**Database Name - medi**

### USERINFO TABLE
S.No   | Field name  | Data Type   | Description            | Constraints 
------ | ----------- | ----------- | ---------------------- | -------------
1      | firstname   | Varchar(20) | First name of the user	
2	   | lastname    | Varchar(20) | Last name of the user	
3	   | gender	     | Varchar(20) | Gender of the user	
4	   | dateofbirth | date	       | Date of Birth	
5	   | username    | Varchar(20) | Username of the user   | Primary Key
6	   | password    | Varchar(20) | Password of the user	
7	   | address	 | Varchar(100)| Address of the user	
8	   | Phoneno:    | Varchar(10) | Phone Number	
9	   | email	     | Varchar(20) | E-mail Address	
10	   | height	     | Int(3)	   | Height of the user	
11	   | weight	     | Int(3)	   | Weight of the user	


**Contains informtion regarding registered users in this table**

	
### TESTS TABLE
S.No  | Field name | Data Type    | Description          
----- | ---------- | ------------ | ------------------------
1	  | testname   | Varchar(100) | Name of the test
2	  | username   | Varchar(20)  | Username of the user  
3	  | value	   | Varchar(30)  |	Result of the test
4	  | unit	   | Varchar(25)  |	Unit of measurement
5	  | type	   | Varchar(2)	  | Type of test
6	  | report	   | Varchar(2)	  | Eligibility for report
7	  | filename   | Varchar(10)  |	Filename of the test


**Contains informtion regarding the tests and their results and the users that took them**


### TEST_LIST TABLE

S.No  | Field name | Data Type    | Description          | Constraints 
----- | ---------- | ------------ | -------------------- | -------------------
1	  | testname   | Varchar(100) | Name of the test     
2	  | visits	   | Varchar(30)  |	No: of visits	     | Default Value = 0
3	  | filename   | Varchar(30)  |	Filename of the test	


**Contains all the tests with additional information**  


### LABTECH TABLE
S.No  | Field name | Data Type   | Description              | Constraints 
----- | ---------- | ----------- | ------------------------ | -------------
1	  | id         | Int(11)     | Id of the lab technician | Primary Key
2	  | firstname  | Varchar(20) | First name 	
3	  | lastname   | Varchar(20) | Last name	
4	  | password   | Varchar(20) | Password	
5	  | gender     | Varchar(10) | Gender 	
6	  | contact	   | Varchar(10) | Contact number	


**Contains information regarding the lab technicians**


### LEQUIP TABLE
S.No  | Field name | Data Type   | Description       | Constraints 
----- | ---------- | ----------- | ----------------- | -------------
1	  | eq_name	   | Varchar(50) | Name of Equipment | Primary Key
2	  | available  | Int(4)	     | Available number 	
3	  | maximum	   | Int(4)	     | Maximum number	
4	  | ord	       | Int(4)	     | Ordered number	
5	  | dates	   | Varchar(20) | Date of order	
6	  | price	   | Int(10)	 | Price of order	
7	  | status	   | Varchar(3)	 | Status of Delivery	


**Contains information regarding the lab equipments**

















