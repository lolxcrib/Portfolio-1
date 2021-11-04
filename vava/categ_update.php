<?php
include 'database/db.php';

if(isset($_POST['updatedata'])){

	$id= $_POST['update_id'];
	$categ=$_POST['categ'];


	$sql="UPDATE category SET categ_name='$categ' WHERE categ_id='$id'";

	$query_run= mysqli_query($conn,$sql);

	if($query_run){

		echo "POOOOTA";
		header('location:category.php');
	}else{

		echo "TANGINGA";
	}

}

?>