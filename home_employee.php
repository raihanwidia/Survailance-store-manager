<?php
include 'bootstrap.php';
include 'header_home_manager_employee.php';
?>


<html>
<head>
<link href="settings.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script >

function postdata(id){
  var id_prod = id;
  $.ajax({
    url : './getproduct.php',
    type: 'GET',
    // dataType :'Json',
    data : {user: id_prod},
    success : function(data) {
      userData = JSON.parse( data.toString());

      $('#product_name').val(userData.name);
      $('#date_entry').val(userData.date_enter);
      $('#price_product').val(userData.price);
      $('#type_product').val(userData.type);
      $('#ID_product').val(userData.primary_key_product);
    },
    error: function(data) {
      alert("Not Working");
    },

  }); 
         

}

</script>
</head>

<body>
<div class="row" id="whole-row">
  <div class="col-12 col-md-8 " id="product">
    <div class = "jumbotron">
    <input type="text" class="form-control"  id="search" placeholder="Search">      
    </div>

    <div id="wrapper">
  <?php

$db=mysqli_connect("localhost","root", "","webengineer");


$email_staff =  $_SESSION['email'];
$primarykey_owner = "SELECT owner_key FROM store_employee WHERE email='$email_staff'";
$res = mysqli_query($db, $primarykey_owner);
$res1 = mysqli_fetch_assoc($res);
$res2 = $res1['owner_key'];

$results = $db->query("SELECT name , price , type , date_enter  , primary_key_product , pict_path  FROM list_product WHERE owner_key='$res2'");
if($results){ 
$products_item = '<ul style="list-style-type: none;">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT

   
<div class="card box" style="width: 18rem;">
    <img class="card-img-top" src="Pictures/{$obj->pict_path}" alt="Card image cap">
    <div class="card-body">
        <h5 class="name" >{$obj->name}</h5>
        <p class="card-text">Price : RM {$obj->price}.00</p>
        <br>
        <button class= "btn btn-primary" type="submit" onClick="postdata({$obj->primary_key_product})" class="edit_product" id="get_product" name="get_product" value="{$obj->primary_key_product}">See Details</button>
    </div>
</div>
	
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>    
 </div>
  </div>

  <div id="side-bar" class="col-6 col-md-4 bg-info text-white ">
      <form action="product.php" method="post" enctype="multipart/form-data">

      <div class="form-group row">
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Name of product</label>
         <div class="col-sm-10">
         <input type="text" class="form-control form-control-sm" name="product_name" id="product_name" placeholder="Name Of product" readonly>
         </div>
      </div>

       <div class="form-group row">
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Date Entry</label>
         <div class="col-sm-10">
         <input type="date" class="form-control form-control-sm" name="date_entry" id="date_entry" placeholder="Date Entry" readonly >
         </div>
       </div>

       <div class="form-group row">
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Price</label>
         <div class="col-sm-10">
         <input type="number" class="form-control form-control-sm" min="0.01" step="0.01"  name="price_product" id="price_product" placeholder="Price" readonly>
         </div>
       </div>

       <div class="form-group row">
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Type</label>
         <div class="col-sm-10">
         <input type="text" class="form-control form-control-sm" name="type_product" id="type_product" placeholder="Type of product" readonly>
         </div>
       </div>

       <div class="form-group row">
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">ID</label>
         <div class="col-sm-10">
         <input type="text" class="form-control form-control-sm" name="ID_product" id="ID_product" placeholder="Type of product" readonly> 
         </div>
        </div>


       
       </form> 
  </div>
</div>

</body>

</html>

