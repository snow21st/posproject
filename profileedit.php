<?php 
include('dbconnect.php');

$id=$_POST['id'];
$oldphoto=$_POST['oldphoto'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$address=$_POST['address'];
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
$sql="UPDATE users SET name=:name, profile=:profile,email=:email,password=:password,phone=:phone,address=:address
 Where id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->bindParam(':profile',$file_path);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':password',$password);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':address',$address);
$stmt->execute();

header('location:userprofile.php');




?>