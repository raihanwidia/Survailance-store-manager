<?php


session_start();
$db=mysqli_connect("localhost","root", "","webengineer");
$errors = array(); 


if (isset($_POST['add_product'])) {
    // receive all input values from the form
    $product_name = mysqli_real_escape_string($db, $_POST['product_name']);
    $date_entry = mysqli_real_escape_string($db, $_POST['date_entry']);
    $price_product = mysqli_real_escape_string($db, $_POST['price_product']);
    $type_product = mysqli_real_escape_string($db, $_POST['type_product']);


  if (empty($product_name)) { array_push($errors, "product name is required"); }
  if (empty($date_entry)) { array_push($errors, "date entry is required"); }
  if (empty($price_product)) { array_push($errors, "price is required"); }
  if (empty($type_product)) { array_push($errors, "type product is required"); }



  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM list_product WHERE name='$product_name' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $prod = mysqli_fetch_assoc($result);
  
  if ($prod) { // if user exists
    if ($prod['name'] === $product_name) {
      array_push($errors, "product already exists");
    }
  }

  if (count($errors) == 0) {

    $email_owner = $_SESSION['email'] ;

    $primarykey_owner = "SELECT numebr FROM store_owner WHERE email='$email_owner'";
    $res = mysqli_query($db, $primarykey_owner);
    $res1 = mysqli_fetch_assoc($res);
    $res2 = $res1['numebr'];

    $file_name = $_FILES['file_picture']['name'];
    $fileTmpName = $_FILES["file_picture"]["tmp_name"];

    $fileExt = explode('.',$file_name);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg' , 'jpeg' , 'png' );

    if(in_array($fileActualExt , $allowed)){
      $filesNameNew = uniqid('',true).".".$fileActualExt;
      $fileDestination = "Pictures/".$filesNameNew;
      move_uploaded_file($fileTmpName , $fileDestination);
    }


     
      

    $query = "INSERT INTO list_product (name , price, type , date_enter , pict_path , owner_key ) 
              VALUES('$product_name', '$price_product', '$type_product' , '$date_entry' , '$filesNameNew' , '$res2')";

    echo $query;

    mysqli_query($db, $query);

 


  }

}else if (isset($_POST['save_changes'])){

  $product_name = mysqli_real_escape_string($db, $_POST['product_name']);
  $date_entry = mysqli_real_escape_string($db, $_POST['date_entry']);
  $price_product = mysqli_real_escape_string($db, $_POST['price_product']);
  $type_product = mysqli_real_escape_string($db, $_POST['type_product']);
  $ID_prod = mysqli_real_escape_string($db, $_POST['ID_product']);


  if (empty($product_name)) { array_push($errors, "product name is required"); }
  if (empty($date_entry)) { array_push($errors, "date entry is required"); }
  if (empty($price_product)) { array_push($errors, "price is required"); }
  if (empty($type_product)) { array_push($errors, "type product is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM list_product WHERE primary_key_product='$ID_prod' LIMIT 1 ";
  $result = mysqli_query($db, $user_check_query);
  $prod = mysqli_fetch_assoc($result);


  if ($prod) { // if user exists

    if (count($errors) == 0) {
  
      // $email_owner = $_SESSION['email'] ;
    
      // $primarykey_owner = "SELECT numebr FROM store_owner WHERE email='$email_owner'";
      // $res = mysqli_query($db, $primarykey_owner);
      // $res1 = mysqli_fetch_assoc($res);
      // $res2 = $res1['numebr'];


        $file_name = $_FILES['file_picture']['name'];
        $fileTmpName = $_FILES["file_picture"]["tmp_name"];
  
        $fileExt = explode('.',$file_name);
        $fileActualExt = strtolower(end($fileExt));
  
        $allowed = array('jpg' , 'jpeg' , 'png' );
  
        if(in_array($fileActualExt , $allowed)){
          $filesNameNew = uniqid('',true).".".$fileActualExt;
          $fileDestination = "Pictures/".$filesNameNew;
          move_uploaded_file($fileTmpName , $fileDestination);
        }

      

   
    
      $query = "UPDATE list_product SET name='$product_name', price='$price_product', date_enter='$date_entry', type='$type_product' , pict_path='$filesNameNew' WHERE primary_key_product='$ID_prod'";

      mysqli_query($db, $query);
    }
  }

}else{
  header('location: home.php');
}

header('location: home.php');

?>