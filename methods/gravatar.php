<?php

function getGravatar($email, $size)
{
    $default = "https://cdn-icons-png.flaticon.com/512/149/149071.png";
    $url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode($default) . "&s=" . $size;

    return $url;
}
