<?php
include 'bootstrap.php';
include 'header_home_manager_employee.php';
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

    </div>

    <div>
      <?php

$db=mysqli_connect("localhost","root", "","webengineer");

$email_staff =  $_SESSION['email'];
$primarykey_owner = "SELECT owner_key FROM store_employee WHERE email='$email_staff'";
$res = mysqli_query($db, $primarykey_owner);
$res1 = mysqli_fetch_assoc($res);
$res2 = $res1['owner_key'];

$results = $db->query("SELECT ip_address FROM camera WHERE owner_key='$res2'");
if($results){ 
$products_item = '<table class="table table-dark " ">
<thead>
  <tr>
    <th>IP</th>
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