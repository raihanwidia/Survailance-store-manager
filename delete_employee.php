<?php

$id =  $_POST['delete_employee'];

$db=mysqli_connect("localhost","root", "","webengineer");

if (isset($_POST['delete_employee'])) {

    $id =  $_POST['delete_employee'];

    $querry = "DELETE FROM store_employee WHERE primary_key_employee='$id'";
    mysqli_query($db , $querry);

    echo($querry);

    header('location: employee.php');


}

?>