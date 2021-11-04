<?php

		include 'database/db.php';


	

?>

<?php

$id=$_GET['updateid'];

$disp= "SELECT * FROM `stock` WHERE id=$id";

$rs=mysqli_query($conn,$disp);
$row=mysqli_fetch_assoc($rs);
$category=$row['category_id'];
$name=$row['product_name'];
$qty=$row['qty'];
$size=$row['sizing'];
$description=$row['description'];
$price=$row['prc'];



if(isset($_POST['submit'])){
//$category = $_POST['category'];
$name = $_POST['name'];
$qty = $_POST['qty'];
$size = $_POST['size'];
$description = $_POST['description'];
$price = $_POST['price'];



$sql= "UPDATE `stock` SET `id`=$id,`product_name`='$name',`qty`=$qty,`sizing`='$size',`description`='$description',`prc`=$price where id=$id";


	$result = mysqli_query($conn, $sql);
	if($result){		

		echo "UPDATED successfully";
		header('location: stocks.php');

	}else{

		die(mysqli_error($conn));
	}


}


?>

<?php
if(isset($_POST['submit1'])){

	header('location: stocks.php');	
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>	Manage Stocks</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<center>
	<form action="" method="POST">
	<h1>Update Supply</h1>
	


	<br>
	<br>
	<label>Product Name
	<input type="text" name="name" value=<?php  echo $name; ?> required>
	</label>
	<br>
	<br>
	<label>Quantity <input type="number" name="qty" value=<?php  echo $qty; ?> required ></label>
	<br>
	<br>
	<label>Sizing <input type="text" name="size" value=<?php  echo $size; ?> required></label>
	<br>
	<br>
	<label>Description <textarea name="description" value=<?php  echo $description; ?>> <?php echo $description ?></textarea></label>
	<br>
	<br>
	<label>Price <input type="number" name="price" value=<?php  echo $price; ?> required></label>
	<br>
	<br>
	<input type="submit" name="submit" value="UPDATE">
	<input type="submit" name="submit1" value="CANCEL">


	</form>

	

</center>

</body>
</html>