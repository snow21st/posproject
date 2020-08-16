<?php 
include('dbconnect.php');

$name=$_POST['name'];


$phone=$_POST['phone'];
$email=$_POST['email'];
$status=1;

$password=$_POST['password'];
$address=$_POST['address'];
$role_id=0;

$image=$_FILES['photo'];

$image_name=$image['name'];
$file_exe_array=explode('.',$image_name);
$file_exe=$file_exe_array[1];

$source_dir="img/";
$file_name=mt_rand(100000,999999);


$file_path=$source_dir.$file_name.'.'.$file_exe;




move_uploaded_file($image['tmp_name'], $file_path);


$sql="INSERT INTO users (name,profile,email,password,phone,address,status,role_id)
		VALUES (:name,:profile,:email,:password,:phone,:address,:status,:role_id)";
$stmt=$conn->prepare($sql);

$stmt->bindParam(':name',$name);
$stmt->bindParam(':profile',$file_path);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':password',$password);
$stmt->bindParam(':address',$address);
$stmt->bindParam(':status',$status);
$stmt->bindParam(':role_id',$role_id);
session_start();
$_SESSION['reg_success']='Thanks! for register. Your account have been successfully created and you 
can now sign in.';

if($stmt->execute()){
	header('location:login.php');

}
else{
	echo "something went wrong";
}




 ?>