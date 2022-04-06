<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin = true;
}
else{
  $loggedin=false;
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand d-flex" href="/php-projects/PHP-miniProject/index.php">
        <img src="img/logo.png" alt="" width="30" height="29" class="mx-5 d-inline-block my-auto">
        <div class="fs-3">
            <strong> Contact Form</strong>
            <small class="fs-6">using php</small>
        </div> 
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="d-flex">';
          if (!$loggedin) {
            echo '<li class="nav-item">
            <a class="btn btn-outline-warning" href="/php-projects/PHP-miniProject/login.php">Login</a>
            </li>
            <li class="nav-item">
            <a class=" btn btn-outline-info" href="/php-projects/PHP-miniProject/signup.php">Signup</a>
            </li>';
          }
          if ($loggedin) {
          echo '<li>
            <a class="btn btn-outline-danger" href="/php-projects/PHP-miniProject/logout.php">Logout</a>
          </li>';
        }
        echo '
      </div>
      </div>
    </div>
    </nav>';

?>