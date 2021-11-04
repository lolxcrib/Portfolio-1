<?php
include 'database/db.php';



				if(isset($_GET['deleteid'])){

					$id=$_GET['deleteid'];


					$sql="DELETE FROM `account_payable` WHERE id=$id";
					$rs=mysqli_query($conn,$sql);

					if($rs){

						echo "Deleted Successfully!!";
						header('location: payable.php');

					}else{

						die(mysqli_error($conn));

					}


				}






?>