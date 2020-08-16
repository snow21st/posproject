<?php 
include('dbconnect.php');

$name=$_POST['name'];
$image=$_FILES['photo'];
$image_name=$image['name'];
$file_exe_array=explode('.',$image_name);
$file_exe=$file_exe_array[1];

$source_dir="img/";
$file_name=mt_rand(100000,999999);


$file_path=$source_dir.$file_name.'.'.$file_exe;


move_uploaded_file($image['tmp_name'], $file_path);

$sql="INSERT INTO categories (name,photo)
		VALUES (:name,:photo)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':photo',$file_path);

if($stmt->execute()){
	header('location:categorieslist.php');

}
else{
	echo "something went wrong";
}




 ?>