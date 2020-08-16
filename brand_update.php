<?php 
include('dbconnect.php');

$id=$_POST['id'];
$oldphoto=$_POST['oldphoto'];
$name=$_POST['name'];
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
$sql="UPDATE brands SET name=:name, logo=:logo Where id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->bindParam(':logo',$file_path);
$stmt->bindParam(':name',$name);
$stmt->execute();

header('location:brand_list.php');




?>