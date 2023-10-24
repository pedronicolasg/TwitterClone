<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();
require_once('methods/verify.php');
require_once('methods/gravatar.php');

if ($_SESSION['id'] == '') {
  verify('signin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | Twitter</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="css/reset.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" href="images/favicon.png" />
</head>

<body>
  <nav>
    <div class="nav_logo-wrapper">
      <svg class="nav_logo" viewBox="0 0 24 24" aria-hidden="true" class="r-1cvl2hr r-4qtqp9 r-yyyyoo r-16y2uox r-8kz0gk r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-lrsllp">
        <g>
          <path d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"></path>
        </g>
      </svg>
    </div>

    <div class="Menu_options active">
      <span class="material-icons">home</span>
      <h2>Home</h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">tag</span>
      <h2>Explorar</h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">group</span>
      <h2>Comunidade</h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">notifications</span>
      <h2>Notificação</h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">email</span>
      <h2>Mensagens</h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">bookmark</span>
      <h2>Salvos</h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">person</span>
      <h2>Perfil</h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">more_horiz</span>
      <h2>Mais</h2>
    </div>
  </nav>
  <main>
    <div class="header">
      <h2>Home</h2>
    </div>

    <div class="tweet_box">
      <form action="methods/tweet.php" method="POST">
        <div class="tweet_box-input">
          <img src="<?php echo getGravatar($_SESSION['email'], 40); ?>" alt="pfp"></img>
          <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username'] ?>">
          <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['email'] ?>">
          <input type="content" name="content" id="content" placeholder="O que está acontecendo?" />
          <button class="" type="submit">Tweet</button>
        </div>
      </form>
    </div>
    <?php require_once('methods/generateTweets.php') ?>
  </main>
  <aside>
    <div class="aside_input">
      <span class="material-icons aside_search-icon">search</span>
      <input type="text" placeholder="Pesquisar" />
    </div>

    <div class="aside_container">
      <h2>O que está acontecendo?</h2>
      <blockquote class="twitter-tweet">
        <p lang="zxx" dir="ltr"><a href="https://t.co/NGqiaGAhy2">https://t.co/NGqiaGAhy2</a></p>&mdash; Pedro Nícolas (@pedronicolasg) <a href="https://twitter.com/pedronicolasg/status/1716942805103419695?ref_src=twsrc%5Etfw">October 24, 2023</a>
      </blockquote>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </aside>
</body>

</html>