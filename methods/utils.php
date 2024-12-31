<?php

class Utils
{
  public static function warnAndRedirect($msg, $path)
  {
    echo "<meta charset='UTF-8' />";
    echo " <script type=\"text/javascript\">
    alert('$msg');
    location.href='$path';
    </script>
    ";
    exit;
  }

  public static function redirect($path)
  {
    echo " <script type=\"text/javascript\">
    location.href='$path';
    </script>
    ";
    exit;
  }

  public static function getGravatar($email, $size)
  {
    $default = "https://cdn-icons-png.flaticon.com/512/149/149071.png";
    $url = "https://www.gravatar.com/avatar/" . md5($email) . "?d=" . urlencode($default) . "&s=" . $size;

    return $url;
  }
}
