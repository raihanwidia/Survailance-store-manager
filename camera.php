<?php
include 'bootstrap.php';
include 'header_home_manager.php';
?>



<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<link href="settings.css" rel="stylesheet">

</head>
<body>
<div class="row" id="whole-row">
   <div class="col-12 col-md-8 ">
   <iframe  width="100%" height="absolute" id="iframe"  src="CAM_DASH.html" name="iframe_a"></iframe>
  </div>


  <div id="side-bar" class="col-6 col-md-4 bg-info text-white ">
    <div>
      <form action="add_camera.php" method="post">
      <div class="form-group row">
         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">IP Address</label>
         <div class="col-sm-10">
         <input type="text" class="form-control form-control-sm" name="camera_name" id="camera_name" placeholder="Name Of product">
         </div>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary  " name="add_camera" value="Add Camera">
      </div>
       </form> 
    </div>

    <div>
      <?php

$db=mysqli_connect("localhost","root", "","webengineer");

$email_owner =  $_SESSION['email'];
$primarykey_owner = "SELECT numebr FROM store_owner WHERE email='$email_owner'";
$res = mysqli_query($db, $primarykey_owner);
$res1 = mysqli_fetch_assoc($res);
$res2 = $res1['numebr'];

$results = $db->query("SELECT ip_address FROM camera WHERE owner_key='$res2'");
if($results){ 
$products_item = '<table class="table table-dark " ">
<thead>
  <tr>
    <th>IP</th>
    <th>Settings</th>
  </tr>
</thead>
<tbody>';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT


<tr>
<td> <a href="{$obj->ip_address}" target="iframe_a" >{$obj->ip_address}</a> <a></td>
<td>
<form action="delete_camera.php" method="POST" >
<button type="submit" name="delete_cam" value="{$obj->ip_address}">Delete</button>
</form>
</td>
</tr>
	
EOT;
}

$products_item .= ' </tbody>
</table>';
echo $products_item;
}
?>    
    </div>


      
  </div>


</div>

</body>