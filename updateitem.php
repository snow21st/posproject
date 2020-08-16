<?php 
include('dbconnect.php');

$id=$_POST['id'];
$oldphoto=$_POST['oldphoto'];
$name=$_POST['name'];
$price=$_POST['price'];
$discount=$_POST['discount'];
$description=$_POST['description'];
$brandid=$_POST['brandid'];
$subid=$_POST['subid'];
$codeno=$_POST['codeno'];
$newphoto=$_FILES['photo'];


if ($newphoto['size']>0) {
	$image_name=$newphoto['name'];
$file_exe_array=explode('.',$image_name);
$file_exe=$file_exe_array[1];

$source_dir="img/";
$file_name=mt_rand(100000,999999);


$file_path=$source_dir.$file_name.'.'.$file_exe;


move_uploaded_file($newphoto['tmp_name'], $file_path);




}
else{

	$file_path=$oldphoto;

}
$sql="UPDATE items SET codeno=:codeno,name=:name,photo=:photo,price=:price,discount=:discount,description=:description,brand_id=:brand_id,subcategory_id=:subcategory_id

  Where id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->bindParam(':codeno',$codeno);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':photo',$file_path);
$stmt->bindParam(':price',$price);
$stmt->bindParam(':discount',$discount);
$stmt->bindParam(':description',$description);
$stmt->bindParam(':brand_id',$brandid);
$stmt->bindParam(':subcategory_id',$subid);

$stmt->execute();

header('location:item-list.php');




?>