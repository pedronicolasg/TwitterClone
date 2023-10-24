<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
require_once('conn.php');
require_once('verify.php');

require_once('gravatar.php');

$username = $_POST['username'];
$gravatar = getGravatar($_POST['email'], 40);
if (isset($_POST['content']) && !empty($_POST['content'])) {
    $content = $_POST['content'];
} else {
    $msg = 'Preencha todos os campos!';
    $local = '../index.php';
    echo "<meta charset='UTF-8' />";
    echo " <script type=\"text/javascript\">
    alert('$msg');
    location.href='$local';
    </script>
    ";
    exit;
}


$sql = 'INSERT INTO tweets(username, gravatar, content) VALUES (?,?,?)';
$result = $conn->prepare($sql);
$data = [$username, $gravatar, $content];
$result->execute($data);

if ($result) {
    $local = '../index.php';
    echo "<meta charset='UTF-8' />";
    echo " <script type=\"text/javascript\">
    location.href='$local';
    </script>
    ";
    exit;
} else {
    $local = '../index.php';
    echo "<meta charset='UTF-8' />";
    echo " <script type=\"text/javascript\">
location.href='$local';
</script>
";
    exit;
}
