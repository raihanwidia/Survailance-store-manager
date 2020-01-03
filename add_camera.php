<?php


session_start();
$db=mysqli_connect("localhost","root", "","webengineer");
$errors = array(); 


if (isset($_POST['add_camera'])) {
    // receive all input values from the form
    $name_emp = mysqli_real_escape_string($db, $_POST['camera_name']);

  if (empty($name_emp)) { array_push($errors, "camera name is required"); }



  if (count($errors) == 0) {

    $email_owner = $_SESSION['email'] ;

    $primarykey_owner = "SELECT numebr FROM store_owner WHERE email='$email_owner'";
    $res = mysqli_query($db, $primarykey_owner);
    $res1 = mysqli_fetch_assoc($res);
    $res2 = $res1['numebr'];

    $query = "INSERT INTO camera (ip_address , owner_key  ) 
              VALUES('$name_emp',  '$res2' )";

    mysqli_query($db, $query);

    header('location: camera.php');


  }else{
    header('location: camera.php');

  }
}

?>