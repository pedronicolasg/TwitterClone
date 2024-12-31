<?php
require_once 'utils.php';
@session_start();
class UserManager
{
  private $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public static function verify($path)
  {
    if (!$_SESSION['id']) return Utils::redirect('', $path);
  }

  public function getTheme($userId)
  {
    $stmt = $this->conn->prepare("SELECT theme FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetchColumn();
  }

  public function toggleTheme($userId)
  {
    $currentTheme = $this->getTheme($userId);
    $newTheme = ($currentTheme === 'light') ? 'dark' : 'light';

    $stmt = $this->conn->prepare("UPDATE users SET theme = ? WHERE id = ?");
    $stmt->execute([$newTheme, $userId]);
  }

  public function register($name, $email, $password)
  {
    $password = md5($password);

    if ($name == '' || $email == '' || $password == '') {
      $msg = 'Preencha todos os campos! ' . $name . $email . $password;
      $local = '../../signup.php';
      Utils::warnAndRedirect($msg, $local);
    }

    $sql = 'SELECT 
            id 
        FROM 
            users 
        WHERE 
            email="' . $email . '"';

    $result = $this->conn->query($sql);

    foreach ($result as $l) {
      $r = $l['id'];
    }
    if ($r > 0) {
      $msg = 'Email já registrado!';
      $local = '../signup.php';
      Utils::warnAndRedirect($msg, $local);
    } else {
      $sql = 'INSERT INTO users(username, email, password) VALUES (?,?,?)';
      $result = $this->conn->prepare($sql);
      $data = [$name, $email, $password];
      $result->execute($data);

      if ($result) {
        $msg = 'Usuário cadastrado com sucesso! Agora faça login na página seguinte.';
        $local = '../../signin.php';
        Utils::warnAndRedirect($msg, $local);
        exit;
      } else {
        $msg = 'Erro ao registrar usuário, tente novamente.';
        $local = '../../signup.php';
        Utils::warnAndRedirect($msg, $local);
        exit;
      }
    }
  }

  public function login($email, $password)
  {
    $sql = "SELECT id, date, username, email, password FROM users WHERE email=:email AND password=:password";
    $result = $this->conn->prepare($sql);
    $result->execute(['email' => $email, 'password' => md5($password)]);
    $user = $result->fetch();

    if (!empty($user)) {
      $_SESSION['id'] = $user['id'];
      $_SESSION['date'] = $user['date'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];

      Utils::redirect('../../index.php');
    } else {
      echo "Usuário não cadastrado.";
    }
  }

  public static function logout($path)
  {
    @session_destroy();
    Utils::redirect($path);
  }
}
