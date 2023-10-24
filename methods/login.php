<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
require_once('conn.php');

session_start();

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT id, date, username, email, password FROM users WHERE email=:email AND password=:password";
$result = $conn->prepare($sql);
$result->execute(['email' => $email, 'password' => $password]);
$user = $result->fetch();


if (!empty($user)) {

    $_SESSION['id'] = $user['id'];
    $_SESSION['date'] = $user['date'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];

    header('Location: ../index.php');
} else {
    echo "Usuário não cadastrado.";
}
