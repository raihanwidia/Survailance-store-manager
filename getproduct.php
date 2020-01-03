<?php

$link = mysqli_connect("localhost","root", "","webengineer");

$user = json_decode($_GET['user']);
$sqline = "SELECT name , price , type , date_enter , pict_path , primary_key_product FROM list_product WHERE primary_key_product = '$user' ";
$sql = mysqli_query($link,$sqline);
$row = mysqli_fetch_array($sql);

echo json_encode($row);

?>