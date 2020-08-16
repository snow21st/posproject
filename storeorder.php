<?php 
require 'dbconnect.php';
session_start();
$cart=$_POST['cart'];
$note=$_POST['note'];


//voucher
date_default_timezone_set('Asia/Yangon'); 
$voucher=strtotime(date("h:i:s"));

$orderdate=date('Y-m-d');
$userid=$_SESSION['loginuser']['id'];

$status=0;
$total=0;

foreach ($cart as $key => $value) {
	$id=$value['id'];
	$qty=$value['qty'];
	$unitprice=$value['newprice'];
	$subtotal=$qty*$unitprice;
	$total+=$subtotal++;

	$sql="INSERT INTO orderdetails(voucherno,qty,item_id) VALUES (:voucherno,:qty,:item_id)";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':voucherno',$voucher);
	$stmt->bindParam(':qty',$qty);
	$stmt->bindParam(':item_id',$id);
	$stmt->execute();
}
		$sql="INSERT INTO orders(orderdate,voucherno,total,note,status,user_id) VALUES (:orderdate,:voucherno,:total,:note,:status,:user_id)";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':orderdate',$orderdate);
	$stmt->bindParam(':voucherno',$voucher);
	$stmt->bindParam(':total',$total);
	$stmt->bindParam(':note',$note);
	$stmt->bindParam(':status',$status);
	$stmt->bindParam(':user_id',$userid);
	$stmt->execute();

 ?>