### EMAIL VERIFICATION IN PHP

This repository was created by, and is maintained by Chanda Chewe. It is an email verification package in PHP which allows you to send verification emails to the new registered users.

### INSTALLATION

If you have composer installed in your machine you can download this package by running `` on your CLI.

### USE CASE
Navigate to `src/libs/config.php` and setup the configurations there. An example below is given for you

`EXAMPLE`

// Your Db credentials here
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "test1234");
define("DB_NAME", "users");
define("TABLE_NAME", "registration");

// Define Your smtp Configurations here
define("SMTP_HOST", "smtp.google.com");
define("SMTP_USER", "chewec03@example.com");
define("SMTP_PASS", "***********");
define("SMTP_SECURE", "ssl");
define("SMTP_PORT", "465");
define("EMAIL_SENDER_NAME", "CHANDA CHEWE");

// VERIFYING URL
define("URL","http://localhost/project/src/verify.php")

The `TABLE_NAME` defined should be the table where you will be storing registered users. This table should contain the `email,pass and verified_at` columns. 
You can start with with the `register.php` in the folder.   


