# employe-management

Project Name : Employee Management

Setup project and run
Step 1: 
take clone from github url
git clone 

Step 2:
open folder in visual studio editor and put .env file on root of project
(find attached in mail)

Step 3:
Create Database in phpmyadmin
database name - "employe_management"

Step 4: Import database sql file (find attached in mail)
employe_management.sql

Step 5:
run command on terminal in project folder
composer install

Step 6:
Open Url in browser : http://localhost/employe-management/
Login Credentails
Email : admin@mailinator.com
Pass : 123456

Description :

1) Dashboard show all employee list
Add Employee
Edit Employee
Delete Employee

2) Department wise highest salary of employees 

3) Salary Range wise employee count (Show salery range wise employee count)
Query : select count(*) as total,sum(CASE WHEN salery BETWEEN 0 AND 50000 THEN 1 ELSE 0 END) as '0-50000', sum(CASE WHEN salery BETWEEN 50000 AND 100000 THEN 1 ELSE 0 END) as '50000-100000', sum(CASE WHEN salery > 100000 THEN 1 ELSE 0 END) as '>100000' from `employes` where `status` != 'deleted';

4) Youngest employee of each department 


