# Contact Form using PHP, MySQLi

- Created contact fill form using PHP & MySQLi database.
- Use of Datatables plugin to format contact records.
- Built using HTML, CSS, Javascript, Jquery, Bootstrap.

## Steps to run
1) Download XAMPP server :
https://www.apachefriends.org/download.html

2) Create folder `php-projects` on location
```
C:\xampp\htdocs\
```

3) Clone repo on this location `C:\xampp\htdocs\php-projects\`

```
git clone https://github.com/jacktherock/PHP-miniProject-ContactForm.git
```

4) In the XAMPP application start `Apache` & `MySQL` server

5) In the browser go to location `http://localhost/php-projects/PHP-miniproject/`

6) Then at first you have to create database `register_php`, 
```
CREATE DATABASE register_php
```
then create two tables in database `users` and `user_info`
```
CREATE TABLE `register_php`.`users` ( `id` VARCHAR(51) NOT NULL , `username` VARCHAR(23) NOT NULL ,  `password` VARCHAR(23) NOT NULL ,  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`), UNIQUE `username` (`username`))
```

```
CREATE TABLE `register_php`.`user_info` ( `id` VARCHAR(51) NOT NULL , `phone_no` VARCHAR(14) NOT NULL , `first_name` VARCHAR(23) NOT NULL , `last_name` VARCHAR(23) NOT NULL , `age` INT(3) NOT NULL , `note` TEXT NULL , `email` VARCHAR(151) NOT NULL , `created_by` VARCHAR(51) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP )
```

7) After creating database and tables, create new account and login from created account. Then only user can fill contact form.

7) Then fill all contacts details in contact form & submit the form.

8) After submitting contact form user can update & delete that contact field.

## Collaborators
- [Pratik Chopane](https://github.com/prateiku)

## Thanks for visiting!
