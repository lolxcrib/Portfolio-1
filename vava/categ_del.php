<?php
include 'database/db.php';

session_start();
if(isset($_GET['deleteid'])){

				$id=$_GET['deleteid'];


				$sql="delete from `category` where categ_id=$id";
				$result=mysqli_query($conn,$sql);

				if($result){

					//echo "Deleted Succesfull";
					$_SESSION['success'] = "SUCCESSFULLY DELETED";
					header('location: category.php');


				}else{

					//die(mysqli_error($conn));

					$_SESSION['delete'] = "SOME DATA STORED IN THIS CATEGORY";

					header('location: category.php');
				}

			}



?>