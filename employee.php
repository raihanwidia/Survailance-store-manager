<?php
include 'bootstrap.php';
include 'header_home_manager.php';
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
    url : './delete_employee.php',
    type: 'GET',
    // dataType :'Json',
    data : {user: id_prod},
    success : function(data) {
       alert(data);
    },
    error: function(data) {
      alert("Not Working");
    },

  }); 
         

}

</script>
</head>

<div class="jumbotron" id = "employee_form">
<form action="add_employee.php" method="POST">
  <div class="form-row" >
    <div class="col">
      <input type="text" name="name_employee" class="form-control" placeholder="Name of Employee">
    </div>
    <div class="col">
      <input type="email" name="email_employee" class="form-control" placeholder="Email of Employee">
    </div>
    <div class="col">
      <input type="text" name="password" class="form-control" placeholder="Password">
    </div>
    <div class="col">
      <button type="submit" class="btn btn-primary  " name="add_employee">Register</button>
    </div>
  </div>
</form>





<?php

$db=mysqli_connect("localhost","root", "","webengineer");

$email_owner = $_SESSION['email'] ;

$primarykey_owner = "SELECT numebr FROM store_owner WHERE email='$email_owner'";
$res = mysqli_query($db, $primarykey_owner);
$res1 = mysqli_fetch_assoc($res);
$res2 = $res1['numebr'];

$results = $db->query("SELECT employee_name , email , primary_key_employee  FROM store_employee WHERE owner_key='$res2'");
if($results){ 
$products_item = '<table class="table table-striped">
<thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Status</th>
  </tr>
</thead>
<tbody>';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT

<tr>
<td>{$obj->employee_name}</td>
<td>{$obj->email}</td>
<td>
<form action="delete_employee.php" method="POST">
<button type="submit" name="delete_employee" value="{$obj->primary_key_employee}">Delete Employee</button>
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





</html>