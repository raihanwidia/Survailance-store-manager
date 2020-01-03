<?php


session_start();
$db=mysqli_connect("localhost","root", "","webengineer");
$errors = array(); 


if (isset($_POST['add_employee'])) {
    // receive all input values from the form
    $name_emp = mysqli_real_escape_string($db, $_POST['name_employee']);
    $email_emp = mysqli_real_escape_string($db, $_POST['email_employee']);
    $pass_emp = mysqli_real_escape_string($db, $_POST['password']);


  if (empty($name_emp)) { array_push($errors, "product name is required"); }
  if (empty($email_emp)) { array_push($errors, "date entry is required"); }
  if (empty($pass_emp)) { array_push($errors, "price is required"); }


  if (count($errors) == 0) {

    $email_owner = $_SESSION['email'] ;

    $primarykey_owner = "SELECT numebr FROM store_owner WHERE email='$email_owner'";
    $res = mysqli_query($db, $primarykey_owner);
    $res1 = mysqli_fetch_assoc($res);
    $res2 = $res1['numebr'];

    $query = "INSERT INTO store_employee (employee_name , email, owner_key  , password ) 
              VALUES('$name_emp', '$email_emp', '$res2' , '$pass_emp' )";

    mysqli_query($db, $query);

    header('location: employee.php');


  }
}

?>