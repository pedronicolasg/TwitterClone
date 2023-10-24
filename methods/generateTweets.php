<?php
    require_once('conn.php');
    require_once('gravatar.php');

    $query = "SELECT * FROM tweets ORDER BY date DESC";
    $result = $conn->query($query);

    if ($result) {
      $link = 'href="tweetFiles/' . $row['link'] . '"';
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="post">        <div class="post_profile-image">            <img src="' . $row['gravatar'] . '" alt="user-gravatar" />        </div>        <div class="post_body">            <div class="post_header">                <div class="post_header-text">                    <h3>                        <span class="header-icon-section">                            @' . $row['username'] . '                        </span>                    </h3>                </div>                <div class="post_header-discription">             <p>' . $row['content'] . '</p>                </div>            </div>            <div class="post_footer">                <span class="material-icons">chat</span>                <span class="material-icons">repeat</span>                <span class="material-icons">favorite_border</span>                <span class="material-icons">file_upload</span>            </div>        </div>    </div>';
      }
    } else {
      echo "<p>No one tweeted yet. Be the first one to tweet!</p>";
    }
