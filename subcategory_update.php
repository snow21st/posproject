<?php 
include('dbconnect.php');

$id=$_POST['id'];
$catid=$_POST['categoryid'];
$name=$_POST['name'];



$sql="UPDATE subcategories SET name=:name,category_id=:category_id  Where id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);

$stmt->bindParam(':name',$name);
$stmt->bindParam(':category_id',$catid);
$stmt->execute();

header('location:subcategory_list.php');




?>