
<?php

session_start();

if(isset($_SESSION['email'])){
    // echo '<p> you are logged in </p>';
    $email = $_SESSION['email'];

}else{
    header('location : index.php');
}

include 'bootstrap.php';

?>

<html>


<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Team Tiger</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="camera.php">Camera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="employee.php">Employee</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out</a>
      </li>
    </ul>
    <span class="navbar-text">
       Manager : <?php print($email) ?>
    </span>
  </div>
</nav>

</body>

</html>