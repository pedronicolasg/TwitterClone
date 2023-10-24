<?php

function verify($path)
{
    if (!$_SESSION['id']) return header('Location: ' . $path);
}