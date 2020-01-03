<?php
$db=mysqli_connect("localhost","root", "","webengineer");
$radioVal = $_POST["MyRadio"];

$errors = array(); 


if ($radioVal == 'First'){

    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['pwd']);
      
        if (empty($email)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
      
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM store_owner WHERE email='$email' AND password='$password'";
    
            echo $email ;
            echo $password ;
    
            $results = mysqli_query($db, $query);
    
            echo mysqli_num_rows($results);
    
    
            if (mysqli_num_rows($results) == 1) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "You are now logged in";
                header('location: home.php');
                echo "<script> alert('success');</script>";
            }else {
                array_push($errors, "Wrong username/password combination");
                header('location: index.php');
    
                
            }
        }
    }
}else if ($radioVal == 'Second'){
    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['pwd']);
      
        if (empty($email)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
      
        if (count($errors) == 0) {
            $query = "SELECT * FROM store_employee WHERE email='$email' AND password='$password'";

            $results = mysqli_query($db, $query);
    
            echo mysqli_num_rows($results);
    
    
            if (mysqli_num_rows($results) == 1) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "You are now logged in";
                header('location: home_employee.php');
            }else {
                array_push($errors, "Wrong username/password combination");
                header('location: home.php');
    
                
            }
        }
    }
}


  
  ?>


