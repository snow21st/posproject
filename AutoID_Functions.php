<?php
function AutoID($tableName,$fieldName,$prefix,$noOfLeadingZeros)
{ 
	include('dbconnect.php');

	$newID="";
	$sql="";
	$value=1;

	$sql="SELECT " . $fieldName . " FROM " . $tableName . " ORDER BY " . $fieldName . " DESC";	
	
	$result=$conn->prepare($sql);
$result->execute();
$noOfRow= $result->rowCount();

$row=$result->fetchall(PDO::FETCH_ASSOC);


	// $result = mysqli_query($conn,$sql);
	// $noOfRow=mysqli_num_rows($result);
	// $row = mysqli_fetch_array($result);		
	
	if ($noOfRow<1)
	{		
		return $prefix . "000001";
	}
	else
	{
		$oldID=$row[$fieldName];	//Reading Last ID
		$oldID=str_replace($prefix,"-",$oldID);	//Removing "Prefix"
		$value=(int)$oldID;	//Convert to Integer
		$value++;	//Increment		
		$newID=$prefix . NumberFormatter($value,$noOfLeadingZeros);			
		return $newID;		
	}
}

function NumberFormatter($number,$n) 
{	
	return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}
?>
