<?php

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
      <div class="container">
        
        <a class="navbar-brand" href="index.php">Instrumental</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
          <span class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="page-1.php">Page 1</a>
              </li>
              <li class="nav-item">
               <a class="nav-link" aria-current="page" href="newRegister.php">Page 2</a>
              </li>
              <li class="nav-item">';
if(isset($_SESSION['id'])){
    echo '<a class="nav-link" aria-current="page" href="logout.php"> Logout </a>';
} else {
    echo '<a class="nav-link" aria-current="page" href="login.php"> Login </a>';
}
              echo '</li>
            </ul>
          </span>
        </div>
      </div>
    </nav>';
