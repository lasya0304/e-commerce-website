<?php
  session_start();

  if(!isset($_SESSION['login_status'])){
    echo "Illegal Attempt, Login Bypassed";
    die;
  }
  if($_SESSION['login_status'] == false){
    echo "Unauthorized Access, 403: Forbidden";
    die;
  }
  echo "<div class='d-flex justify-content-between'>
          <div>
            $_SESSION[userid]
          </div>
          <div>
            $_SESSION[username]
          </div>
          <div>
            <a href='../shared/logout.php'>Logout</a>
          </div>
        </div>";
?>
