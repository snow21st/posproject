<?php 
include('dbconnect.php');
session_start();

$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT users.*,roles.name as rname
FROM users
LEFT JOIN roles
ON users.role_id=roles.id
WHERE email=:email AND password=:password";

$stmt=$conn->prepare($sql);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':password',$password);
$stmt->execute();

if ($stmt->rowcount()<=0) {
	

	if(!isset($_COOKIE['loginCount'])){  // to control log in fail
		$loginCount=1;
	}
	
	else{
			$loginCount=$_COOKIE['loginCount'];
			$loginCount++;
	}

	setcookie('loginCount',$loginCount,time()+10);

	if ($loginCount>=3) {
		echo"<img src='img/brand/403.gif' style='width:100%;height:100vh;object-fit:cover;'>";
			setcookie('loginCount','',time()-10);
		echo " <script>
       (function () {
           setTimeout(function () {
               location.href='login.php';
           },50000);
       })();
    </script>";

	}
	else{
		$_SESSION['fail']='log in fail invalid user name or password';
		header('location:login.php');
	}
}
else {
	$user=$stmt->fetch(PDO::FETCH_ASSOC);
	$_SESSION['loginuser']=$user;
	

	// var_dump($user);
	$roleid=$user['role_id'];
	if ($roleid==1) {
		header('location:categorieslist.php');
	}
	else
	{
		header('location:index.php');
	}
}


?>