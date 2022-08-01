<?php
require __DIR__.'/libs/Verification.php';

$conn = new Verification;
$key = $_GET['key'];
$conn->verify_email($key);

?>