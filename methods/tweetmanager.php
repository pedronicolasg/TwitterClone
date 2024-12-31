<?php
require_once 'utils.php';

class tweetManager
{
  private $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function renderTweets($order)
  {
    $query = "SELECT * FROM tweets ORDER BY $order DESC";
    $result = $this->conn->query($query);

    if ($result) {
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-900 cursor-pointer">
        <div class="flex">
            <img src="' . $row['gravatar'] . '" alt="user-gravatar" class="w-12 h-12 rounded-full mr-4">
            <div>
                <div class="flex items-center">
                    <span class="font-bold mr-2">@' . $row['username'] . '</span>
                    <span class="text-gray-500 dark:text-gray-400">· 1h</span>
                </div>
                <p class="mt-2">' . $row['content'] . '</p>
                <div class="flex justify-between mt-4 w-full max-w-md text-gray-500 dark:text-gray-400 space-x-7">
                  <button class="flex items-center hover:text-blue-500">
                    <i data-feather="message-circle" class="mr-2"></i>
                    <span>0</span>
                  </button>
                  <button class="flex items-center hover:text-green-500">
                    <i data-feather="repeat" class="mr-2"></i>
                    <span>0</span>
                  </button>
                  <button class="flex items-center hover:text-red-500">
                    <i data-feather="heart" class="mr-2"></i>
                    <span>0</span>
                  </button>
                  <button class="flex items-center hover:text-blue-500">
                    <i data-feather="share" class="mr-2"></i>
                  </button>
              </div>
            </div>
        </div>
    </div>';
      }
    } else {
      echo '<p class="text-center dark:text-gray-300">No one tweeted yet. Be the first one to tweet!</p>';
    }
  }

  public function tweet($username, $gravatar, $content)
  {
    $sql = 'INSERT INTO tweets(username, gravatar, content) VALUES (?,?,?)';
    $result = $this->conn->prepare($sql);
    $data = [$username, $gravatar, $content];
    $result->execute($data);

    Utils::redirect('../../index.php');
  }
}
