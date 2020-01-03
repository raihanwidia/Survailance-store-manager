<?php
include 'header_starter.php';
// session_start();
// if(isset($_SESSION['email'])){
//     header('location: home.php');
//   }else{
//     header('location: index.php');
//   }
  

?>


<html>

<div class="container">
    <div class="d-flex justify-content-center">
        <div >

          <h2> Store Owner Registration </h2>

          <br>
            <form action="register.staff.php" method="post">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="usrnm">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="pwd">
                </div>
                <button type="submit" class="btn btn-primary" name="reg_user" >Register</button>
            </form>
        </div>

    </div>
</div>
</html>