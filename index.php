<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();
require_once 'methods/conn.php';
require_once 'methods/usermanager.php';
require_once 'methods/tweetmanager.php';
require_once 'methods/utils.php';

$userManager = new UserManager($conn);
$tweetManager = new TweetManager($conn);

UserManager::verify('signin.php');
$theme = $userManager->getTheme($_SESSION['id']);

?>
<!DOCTYPE html>
<html lang="en" class="<?php echo htmlspecialchars($theme); ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
  <title>Twitter Clone</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
</head>

<body class="bg-white dark:bg-black text-black dark:text-white">
  <div class="container mx-auto flex flex-col md:flex-row min-h-screen">
    <div class="w-full md:w-64 p-5 border-b md:border-r border-gray-100 dark:border-gray-800">
      <div class="mb-8">
        <form action="methods/handlers/theme.php">
          <button type="submit">
            <svg viewBox="0 0 24 24" class="h-8 w-8 fill-current">
              <path d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"></path>
            </svg>
          </button>
        </form>
      </div>
      <nav>
        <a href="#" class="flex items-center mb-4 p-3 rounded-full hover:bg-gray-100 dark:hover:bg-gray-900">
          <i data-feather="home" class="mr-4"></i>
          <span class="text-xl">Home</span>
        </a>
        <a href="#" class="flex items-center mb-4 p-3 rounded-full hover:bg-gray-100 dark:hover:bg-gray-900">
          <i data-feather="search" class="mr-4"></i>
          <span class="text-xl">Explore</span>
        </a>
        <a href="#" class="flex items-center mb-4 p-3 rounded-full hover:bg-gray-100 dark:hover:bg-gray-900">
          <i data-feather="bell" class="mr-4"></i>
          <span class="text-xl">Notifications</span>
        </a>
        <a href="#" class="flex items-center mb-4 p-3 rounded-full hover:bg-gray-100 dark:hover:bg-gray-900">
          <i data-feather="mail" class="mr-4"></i>
          <span class="text-xl">Messages</span>
        </a>
        <a href="methods/handlers/logout.php" class="flex items-center mb-4 p-3 rounded-full hover:bg-gray-100 dark:hover:bg-gray-900">
          <i data-feather="log-out" class="mr-4"></i>
          <span class="text-xl">Exit</span>
        </a>
      </nav>
    </div>

    <div class="flex-1 border-b md:border-r border-gray-100 dark:border-gray-800">
      <header class="p-4 border-b border-gray-100 dark:border-gray-800">
        <h1 class="text-xl font-bold">Home</h1>
      </header>

      <form action="methods/handlers/tweet.php" method="POST">
        <div class="p-4 border-b border-gray-100 dark:border-gray-800">
          <div class="flex">
            <img src="<?php echo Utils::getGravatar($_SESSION['email'], 150) ?>" alt="Profile" class="w-12 h-12 rounded-full mr-4">
            <div class="flex-1">
              <textarea class="w-full bg-transparent text-xl p-2 resize-none" id="content" name="content" placeholder="What's happening?" required></textarea>
              <div class="flex justify-between items-center mt-4">
                <div class="flex space-x-4 text-blue-500">
                  <i data-feather="image"></i>
                  <i data-feather="bar-chart-2"></i>
                  <i data-feather="smile"></i>
                  <i data-feather="calendar"></i>
                </div>
                <button type="submit" class="bg-blue-500 text-white rounded-full px-4 py-2 hover:bg-blue-600">
                  Tweet
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>

      <div class="divide-y divide-gray-100 dark:divide-gray-800">
        <?php $tweetManager->renderTweets('date');
        ?>
      </div>
    </div>

    <div class="w-full md:w-80 p-4">
      <div class="relative">
        <i data-feather="search" class="absolute left-3 top-3 text-gray-500"></i>
        <input type="text" placeholder="Search Twitter" class="w-full bg-gray-100 dark:bg-gray-900 rounded-full py-2 pl-10 pr-4">
      </div>

      <div class="bg-gray-100 dark:bg-gray-900 rounded-xl mt-4 p-4">
        <h2 class="text-xl font-bold mb-4">Trends for you</h2>
        <div class="space-y-4">
          <div>
            <div class="text-gray-500 dark:text-gray-400 text-sm">Trending in Technology</div>
            <div class="font-bold">#Bun</div>
            <div class="text-gray-500 dark:text-gray-400 text-sm">50.4K Tweets</div>
          </div>
          <div>
            <div class="text-gray-500 dark:text-gray-400 text-sm">Trending Worldwide</div>
            <div class="font-bold">#TailwindCSS</div>
            <div class="text-gray-500 dark:text-gray-400 text-sm">25.2K Tweets</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    feather.replace();
  </script>
</body>

</html>