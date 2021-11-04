
<!DOCTYPE html>
<html>
<head>
	<title>Search Product</title>
</head>
<body>

<center>
<br>
<br>
<form action="" method="GET">
<input type="text" name="pr_id" placeholder="Enter product " value="<?php if(isset($_GET['pr_id'])){ echo $_GET['pr_id']; }   ?>">
<button>Search</button>
<br>
<br>
<hr>

<?php
include 'database/db.php';

if(isset($_GET['pr_id'])){

	$pr_id = $_GET['pr_id'];
	$query = "SELECT * FROM `stock` WHERE product_name='$pr_id'";
	$q_run = mysqli_query($conn, $query);

	if(mysqli_num_rows($q_run)>0)
	{
		foreach($q_run as $row)
		{

			//echo $row['product_name'];
			?>

			<label>Category ID</label>
<input type="text" name="category" value="<?= $row ['category_id'] ?>" readonly>
<br>
<br>
<label>Product Name</label>
<input type="text" name="name" value="<?= $row ['product_name'] ?>" readonly>
<br>
<br>
<label>Quantity</label>
<input type="text" name="qty" value="<?= $row ['qty'] ?>" readonly>
<br>
<br>
<label>Sizing</label>
<input type="text" name="size" value="<?= $row ['sizing'] ?>" readonly>
<br>
<br>

<label>Description</label>
<textarea value="<?= $row ['description'] ?>" readonly>
	<?php echo $row['description']; ?>
</textarea>
<br>
<br>
<label>Price</label>
<input type="text" name="price" value="<?= $row ['prc'] ?>" readonly>

<?php 
		}

	}else{

		echo "No record found";
	}
}

?>

</form>
<br><br>
<form action="" method="POST">
<label>Customer</label>
<input type="text" name="customer"><br><br>
<label>Quantity release</label>
<input type="text" name="release">
<button type="submit"> Confirm </button>	
</form>
</center>

</body>
</html>

<?php
$category=$_POST['category'];



?>