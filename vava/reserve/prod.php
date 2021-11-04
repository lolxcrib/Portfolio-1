<?php

		include 'database/db.php';

	

?>

<?php

$pr = "SELECT * FROM `category`";	
	$run = mysqli_query($conn, $pr);

if(isset($_POST['submit'])){

$product_id= $_POST['product_id'];
$category = $_POST['category'];
$name = $_POST['name'];
$qty = $_POST['qty'];
$size = $_POST['size'];
$description = $_POST['description'];
$price = $_POST['price'];



$sql= "INSERT INTO `stock`( `product_id`, `category_id`, `product_name`, `qty`, `sizing`, `description`, `prc`) VALUES ('$product_id','$category','$name','$qty','$size','$description','$price')";


	$result = mysqli_query($conn, $sql);
	if($result){
		echo "inserted successfully";
	}else{

		die(mysqli_error($conn));
	}


}


?>

<!DOCTYPE html>
<html>
<head>
	<title>	Manage Stocks</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


	<form action="" method="POST">
	<h1 style="text-align: center;">Manage Supply</h1>
	<label>Category</label>
	<select name="category" id="category"> 
	
	<?php
	
	  while($rows = mysqli_fetch_array($run)){

		?>
		<option value="<?php echo $rows['categ_id']; ?>"> <?php echo $rows['categ_name']; ?></option>
		<?php
	}
	?>

	</select>
	<br>
	<br>
	<label>Product id<input type="text" name="product_id" required></label>
	<br>
	<br>
	<label>Product Name<input type="text" name="name" required></label>
	<br>
	<br>
	<label>Quantity <input type="number" name="qty" required></label>
	<br>
	<br>
	<label>Sizing <input type="text" name="size" required></label>
	<br>
	<br>
	<label>Description <textarea name="description"></textarea></label>
	<br>
	<br>
	<label>Price <input type="number" name="price" required></label>
	<br>
	<br>
	<input type="submit" name="submit">

	<button> <a href="category.php"> Add Category</a></button>

	</form>
		<table class="content-table">
	
	<tr>
		<th>#</th>
		<th>Category</th>
		<th>Product Name </th>
		<th>Quantity </th>
		
		<th>Sizing</th>
		<th>Description</th>
		<th>Price</th>
		<th>Action</th>

	</tr>

	<?php

		include 'database/db.php';


		$sql="SELECT stock.id, stock.product_id, stock.product_name, stock.qty, stock.sizing, stock.description, stock.prc, category.categ_name FROM stock INNER JOIN category ON stock.category_id = category.categ_id";

		$result = $conn->query($sql);
		
		if($result->num_rows > 0){

			while ($row = $result-> fetch_assoc()){
				
			$id=$row['id'];
			$product_id=$row['product_id'];
			$categ_name=$row['categ_name'];
			$pname=$row['product_name'];
			$qty=$row['qty'];
			$sizing=$row['sizing'];
			$description=$row['description'];
			$price=$row['prc'];

			echo '<tr>
			<td>'.$product_id.'</td>
			<td>'.$categ_name.'</td>
			<td>'.$pname.'</td>
			<td>'.$qty.'</td>
			<td>'.$sizing.'</td>
			<td>'.$description.'</td>
			<td>'.$price.'</td>


			<td>
			<button><a href="stock_update.php?updateid='.$id.'">Update</a></button>
		
			</td>


			</tr>';
				
			}
		}else{

			die(mysqli_error($conn));	
		}

		

 
			
		?>

	</table>


	


</body>
</html>