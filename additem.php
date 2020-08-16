<?php 
include('dbconnect.php');

$name=$_POST['name'];
$price=$_POST['price'];
$discount=$_POST['discount'];
$codeno=$_POST['codeno'];
$description=$_POST['description'];
$brandid=$_POST['brandid'];
$subid=$_POST['subid'];

$image=$_FILES['photo'];
$image_name=$image['name'];
$file_exe_array=explode('.',$image_name);
$file_exe=$file_exe_array[1];

$source_dir="img/";
$file_name=mt_rand(100000,999999);


$file_path=$source_dir.$file_name.'.'.$file_exe;




move_uploaded_file($image['tmp_name'], $file_path);

$sql="INSERT INTO items (codeno,name,photo,price,discount,description,brand_id,subcategory_id)
		VALUES (:codeno,:name,:photo,:price,:discount,:description,:brand_id,:subcategory_id)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':codeno',$codeno);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':photo',$file_path);
$stmt->bindParam(':price',$price);
$stmt->bindParam(':discount',$discount);
$stmt->bindParam(':description',$description);
$stmt->bindParam(':brand_id',$brandid);
$stmt->bindParam(':subcategory_id',$subid);


if($stmt->execute()){
	header('location:item-list.php');

}
else{
	echo "something went wrong";
}




 ?>