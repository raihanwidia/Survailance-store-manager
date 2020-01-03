<?php

session_start();    

$db=mysqli_connect("localhost","root", "","webengineer");

if (isset($_POST['delete_cam'])) {

    
    $email_owner = $_SESSION['email'] ;

    $primarykey_owner = "SELECT numebr FROM store_owner WHERE email='$email_owner'";
    $res = mysqli_query($db, $primarykey_owner);
    $res1 = mysqli_fetch_assoc($res);
    $res2 = $res1['numebr'];

    $id =  $_POST['delete_cam'];

    $querry = "DELETE FROM camera WHERE ip_address='$id' AND owner_key='$res2' ";
    mysqli_query($db , $querry);
    header('location: camera.php');


}

?>