<?php
include 'header_starter.php';
?>

<html>



<div class="d-flex justify-content-around" >


  <div>
  <form method="post" action="login.php">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd">
  </div>
  <div class="form-check form-check-inline">
    <input type="radio" name="MyRadio" value="First" checked>
    <label class="form-check-label" for="inlineRadio1">Manager</label>
  </div>
  <div class="form-check form-check-inline">
    <input type="radio" name="MyRadio" value="Second">
    <label class="form-check-label" for="inlineRadio2">Staff</label>
  </div>


  <button type="submit" class="btn btn-primary" name="login_user">Log In</button>

  </form>

  <a href="register.php">Register here</a>


  </div>





</div>


</html>