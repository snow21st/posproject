<?php 
include('dbconnect.php');
$id=$_GET['id'];
$sql="DELETE FROM brands WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

header ('location:brand_list.php');

 ?>