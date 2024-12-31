<?php
require_once '../conn.php';
require_once '../usermanager.php';
require_once '../tweetmanager.php';
require_once '../utils.php';

$userManager = new UserManager($conn);
$userManager->verify('../../signin.php');

$username = $_SESSION['username'];
$gravatar = Utils::getGravatar($_SESSION['email'], 40);
$content = $_POST['content'];

$tweetManager = new TweetManager($conn);
$tweetManager->tweet($username, $gravatar, $content);
