<?php 
include('dbconnect.php');

$name=$_POST['name'];
$id=$_POST['categoryid'];
var_dump($id);

$sql="INSERT INTO subcategories (name,category_id)
		VALUES (:name,:category_id)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':category_id',$id);

if($stmt->execute()){
	header('location:subcategory_list.php');

}
else{
	echo "something went wrong";
}




 ?>