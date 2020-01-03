<?php
include 'bootstrap.php';
include 'header_home_manager.php';
?>


<html>
<head>
<link href="settings.css" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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

<script type="text/javascript">
$(document).on('change', '.custom-file-input', function (event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
})
</script>

<script>
$(document).ready(function(){
  var $btns = $('.btn').click(function() {
        if (this.id == 'all') {
          $('#parent > div').fadeIn(450);
        } else {
          var $el = $('.' + this.id).fadeIn(450);
          $('#parent > div').not($el).hide();
        }
        $btns.removeClass('active');
        $(this).addClass('active');
      })
    var $search = $("#search").on('input',function(){
        $btns.removeClass('active');
        var matcher = new RegExp($(this).val(), 'gi');
        $('.box').show().not(function(){
            return matcher.test($(this).find('.name').text())
        }).hide();
    })
})

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

$email_owner =  $_SESSION['email'];
$primarykey_owner = "SELECT numebr FROM store_owner WHERE email='$email_owner'";
$res = mysqli_query($db, $primarykey_owner);
$res1 = mysqli_fetch_assoc($res);
$res2 = $res1['numebr'];

$results = $db->query("SELECT name , price , type , date_enter  , primary_key_product , pict_path FROM list_product WHERE owner_key='$res2'");
if($results){ 
$products_item = '';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT


<div class="card box" style="width: 18rem;">
    <img class="card-img-top" src="Pictures/{$obj->pict_path}" alt="Card image cap">
    <div class="card-body">
        <h5 class="name" >{$obj->name}</h5>
        <p class="card-text">Price : RM {$obj->price}.00</p>
        <form method="post" action="delete_product.php">
          <button class= "btn btn-primary" type="submit" name="id_product" value="{$obj->primary_key_product}">Delete Item</button>
        </form>
        <br>
        <button class= "btn btn-primary" type="submit" onClick="postdata({$obj->primary_key_product})" class="edit_product" id="get_product" name="get_product" value="{$obj->primary_key_product}">See Details</button>
    </div>
</div>



   
  
	
EOT;
}
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
         <input type="text" class="form-control form-control-sm" name="product_name" id="product_name" placeholder="Name Of product">
         </div>
      </div>

       <div class="form-group row">
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Date Entry</label>
         <div class="col-sm-10">
         <input type="date" class="form-control form-control-sm" name="date_entry" id="date_entry" placeholder="Date Entry">
         </div>
       </div>

       <div class="form-group row">
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Price</label>
         <div class="col-sm-10">
         <input type="number" class="form-control form-control-sm" min="0.01" step="0.01"  name="price_product" id="price_product" placeholder="Price">
         </div>
       </div>

       <div class="form-group row">
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Type</label>
         <div class="col-sm-10">
         <input type="text" class="form-control form-control-sm" name="type_product" id="type_product" placeholder="Type of product">
         </div>
       </div>

       <div class="form-group row">
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">ID</label>
         <div class="col-sm-10">
         <input type="text" class="form-control form-control-sm" name="ID_product" id="ID_product" placeholder="Type of product" readonly> 
         </div>
        </div>

        <div class="form-group ">
        <div class="custom-file">
        <input type="file" name="file_picture" class="custom-file-input" id="inputGroupFile02">
        <label class="custom-file-label" name="name_of_file" for="inputGroupFile02">Choose Picture</label>
        </div>
        </div>
        
       <div class="form-group">
        <input type="submit" class="btn btn-primary  " name="add_product" value="add product">
        <input type="submit" class="btn btn-primary  " name="save_changes" value="save changes" >
       </div>
       
       </form> 
  </div>
</div>

</body>

</html>
