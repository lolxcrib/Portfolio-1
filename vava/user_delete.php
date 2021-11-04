<?php


include 'database/db.php';

	if(isset($_GET['deleteid'])){

					$id=$_GET['deleteid'];

					$sql="DELETE FROM `users` WHERE id=$id";
					$rs=mysqli_query($conn,$sql);

					if($rs){
						header('location:users.php');
						

						
					}else{

						die(mysqli_error($conn));
					}


				}
				


?>

