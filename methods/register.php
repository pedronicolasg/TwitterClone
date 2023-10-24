<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
require_once('conn.php');


$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);

if ($name == '' || $email == '' || $password == '') {
    $msg = 'Preencha todos os campos!';
    $local = '../signup.php';
    echo "<meta charset='UTF-8' />";
    echo " <script type=\"text/javascript\">
    alert('$msg');
    location.href='$local';
    </script>
    ";
    exit;
}

$sql = 'SELECT 
            id 
        FROM 
            users 
        WHERE 
            email="' . $email . '"';

$result = $conn->query($sql);

foreach ($result as $l) {
    $r = $l['id'];
}
if ($r > 0) {
    $msg = 'Email já registrado!';
    $local = '../signup.php';
    echo "<meta charset='UTF-8' />";
    echo " <script type=\"text/javascript\">
    alert('$msg');
    location.href='$local';
    </script>
    ";
    exit;
} else {
    $sql = 'INSERT INTO users(username, email, password) VALUES (?,?,?)';
    $result = $conn->prepare($sql);
    $data = [$name, $email, $password];
    $result->execute($data);

    if ($result) {
        $msg = 'Usuário cadastrado com sucesso! Agora faça login na página seguinte.';
        $local = '../signin.php';
        echo "<meta charset='UTF-8' />";
        echo " <script type=\"text/javascript\">
        alert('$msg');
        location.href='$local';
        </script>
        ";
        exit;
    } else {
        $msg = 'Erro ao registrar usuário, tente novamente.';
        $local = '../signup.php';
        echo "<meta charset='UTF-8' />";
        echo " <script type=\"text/javascript\">
    alert('$msg');
    location.href='$local';
    </script>
    ";
        exit;
    }
}
