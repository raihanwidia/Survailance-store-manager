<?php


$id_product_delete = $_POST['id_product'];

$db=mysqli_connect("localhost","root", "","webengineer");

if (isset($_POST['id_product'])) {

    $id =  $_POST['id_product'];

    $querry = "DELETE FROM list_product WHERE primary_key_product='$id'";
    mysqli_query($db , $querry);


    header('location: home.php');



}





?>