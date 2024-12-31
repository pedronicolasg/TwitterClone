<?php
require_once '../conn.php';
require_once '../usermanager.php';
$userManager = new UserManager($conn);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$userManager->register($name, $email, $password);
