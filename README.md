# Project seeks places

* [About Project](#about-project)
* [Key Features](#Key-Features)
* [Installation](#installation)

## About Project

The code of this project is oriented to a platform in which those people who have a business for example restaurant, bar, etc. You can register and after this appear in the search that the platform has also each person can manage images, menus, promotions that they handle and they will be reflected on the results page.

## Key Features

1. CodeIgniter 3 -> specific version(3.1.10)
2. PHP v5.6
3. HTML
4. CSS3
5. JavaScript
6. Jquery
7. MySQL

## Installation

First create the database with the name `basenegocios`

```
//Import or run the database script found in

project_root/backup_DB/baseNegocios.sql

```

> You would create a database with any name and import it there, for this you will need to edit the `basenegocios.sql` file and remove the line that says `USE 'basenegocios';`

With the database created, now in the file `project_root/application/config/database.php` put the name of the database and configure the other credentials
```
 //For local tests and without password and with the default name of the database, so the configuration would be

   'hostname' => 'localhost',
   'username' => 'root',
   'password' => '',
   'database' => 'basenegocios',
   'dbdriver' => 'mysqli',
```

Followed by the database configuration, now we must assign the path segment known as `base_url` this in` project_path / application / config / config.php`
```
 // Find the variable and put the path

  $config['base_url'] = 'http://localhost/project_root/';

```

This project uses the sending of emails, so so that you do not get an error for this in the files `controllers/Bartdirectoryc.php`, `controllers/Correo.php `, `controllers/Directoryc.php`, `models/Usersm` inside the file do a search for the word `configCorreo`.
```
$config['protocol'] = '';  // smtp or pop
$config['smtp_host'] = ''; // Server to email
$config['smtp_port'] = ;   // 465 o 587
$config['smtp_user'] = ''; // email account that will send the emails
$config['smtp_pass'] = ''; // email account password
```

To use the google mail server it would look something like this:
```
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com'; //If it doesn't work, try this ssl://smtp.googlemail.com
$config['smtp_port'] = 465;
$config['smtp_user'] = 'cuentacorreo@gmail.com';
$config['smtp_pass'] = 'pass12345';
```
