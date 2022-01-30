

Definition: Employee Management

Functional specification:
1. List down all employees in the grid with a paging feature.
2. Give functionality to add/edit and delete employees.
3. Provide below statistics somewhere on the page. 

    i.  Department wise highest salary of employees.
    ii. Salary range wise employee count. [For Example: '0-50000'=> 3,'50001-100000'=>2,'100000+' => 1] [Note : Do it using single query]
    iii. Name and age of the youngest employee of each department.


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


>>>>>>> 16a4527f46125704e7362048e761c50557cdb228
