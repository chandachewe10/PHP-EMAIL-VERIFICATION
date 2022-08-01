### EMAIL VERIFICATION IN PHP

This repository was created by, and is maintained by Chanda Chewe. It is an email verification package in PHP which allows you to send verification emails to the new registered users.

### INSTALLATION

If you have composer installed in your machine you can install this package by running `` on your CLI.

### USE CASE
Navigate to `src/libs/config.php` and setup the configurations there. An example below is given for you

`EXAMPLE`

// Your Db credentials here <br>
define("DB_HOST", "localhost"); <br>
define("DB_USER", "root"); <br>
define("DB_PASS", "test1234"); <br>
define("DB_NAME", "users"); <br>
define("TABLE_NAME", "registration"); <br>

// Define Your smtp Configurations here <br>
define("SMTP_HOST", "smtp.google.com"); <br>
define("SMTP_USER", "chewec03@example.com"); <br>
define("SMTP_PASS", "***********"); <br>
define("SMTP_SECURE", "ssl"); <br>
define("SMTP_PORT", "465"); <br>
define("EMAIL_SENDER_NAME", "CHANDA CHEWE"); <br>

// VERIFYING URL <br>
define("URL","http://localhost/project/src/verify.php") <br>

The `TABLE_NAME` defined should be the table where you will be storing registered users. This table should contain the `email,pass and verified_at` columns. 
You can start with with the `register.php` in the folder.   


