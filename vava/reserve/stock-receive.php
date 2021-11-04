<?php
include 'database/db.php';
?>
<?php
$po="SELECT * FROM `purchase_record_order`";
$run=mysqli_query($conn,$po);

$cat="SELECT * FROM `category`";
$cat_run=mysqli_query($conn,$cat);
///////////////////////////////////////

if(isset($_POST['submit'])){
$receive=$_POST['receive'];
$id=$_POST['id'];
$cat=$_POST['cat'];
$pname=$_POST['pname'];
$qty=$_POST['qty'];
$size=$_POST['size'];
$description=$_POST['description'];
$price=$_POST['price'];

$sql="INSERT INTO `stock_receive`(`receiver_name_id`, `product_id`, `category_id`, `product_name`, `qty`, `sizing`, `description`, `prc`) VALUES ('$receive','$id','$cat','$pname','$qty','$size','$description','$price')";
$result=mysqli_query($conn,$sql);
if($result){

	//echo "DATA INSERTED SUCCESSFULLY!!";

	$sql1="INSERT INTO `stock`(`product_id`, `category_id`, `product_name`, `qty`, `sizing`, `description`, `prc`) VALUES ('$id','$cat','$pname','$qty','$size','$description','$price')";

	$rs=mysqli_query($conn,$sql1);

		if($rs){

		echo "DATA INSERTED SUCCESSFULLY!!";

	}else{

		die(mysqli_error($conn));
	}


}else{

	die(mysqli_error($conn));	
}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock Receive</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<form action="" method="POST">
<h1>STOCK RECEIVING</h1>
<label>Receiver Name</label>
<select name="receive">
	<?php

	while($rows = mysqli_fetch_array($run)){

		?>
		<option value="<?php echo $rows['id']; ?>"> <?php echo $rows['receiver_name']; ?></option>
		<?php

	}

	?>

</select><br><br>

<label>Product #</label>
<input type="text" name="id"><br><br>

<label>Category</label>
<select name="cat">	
	<?php

	while($rows =mysqli_fetch_array($cat_run)){
		?>
		<option value="<?php echo $rows['categ_id']; ?>"><?php echo $rows['categ_name']; ?> </option>
		<?php
	}

	?>
</select><br><br>
<label>Product Name</label>
<input type="text" name="pname"><br><br>

<label>QTY</label>
<input type="number" name="qty"><br><br>

<label>Size</label>
<input type="text" name="size"><br><br>

<label>Description</label>
<textarea name="description"></textarea><br><br>

<label>Price</label>
<input type="text" name="price"><br><br>

<input type="submit" name="submit" value="SAVE">
</form>	



<table class="content-table">

<tr>
	
	
	<th>Receiver Name</th>
	<th>Product #--</th>
	<th>Product Name</th>
	<th>Quantity</th>
	<th>Size</th>
	<th>Description</th>
	<th>Price</th>
	<th>Category</th>
</tr>

<?php

		include 'database/db.php';


		$sql="SELECT stock_receive.receive_id, purchase_record_order.receiver_name, stock_receive.product_id, category.categ_name, stock_receive.product_name, stock_receive.qty, stock_receive.sizing, stock_receive.description, stock_receive.prc FROM stock_receive INNER JOIN purchase_record_order ON stock_receive.receiver_name_id = purchase_record_order.id INNER JOIN category ON stock_receive.category_id = category.categ_id AND purchase_record_order.category_id = category.categ_id";

		$result = $conn->query($sql);
		
		if($result->num_rows > 0){

			while ($row = $result-> fetch_assoc()){
			$id=$row['receive_id'];

			$receive=$row['receiver_name'];
			$product_id=$row['product_id'];
			$product_name=$row['product_name'];
			$receive=$row['receiver_name'];
			$qty=$row['qty'];
			$size=$row['sizing'];
			$description=$row['description'];
			$price=$row['prc'];
			$cat=$row['categ_name'];

			echo '<tr>
			<td>'.$receive.'</td>
			<td>'.$product_id.'</td>
			<td>'.$product_name.'</td>
			<td>'.$qty.'</td>
			<td>'.$size.'</td>
			<td>'.$description.'</td>
			<td>'.$price.'</td>
			<td>'.$cat.'</td>
			</tr>';
				
			}
		}else{

			die(mysqli_error($conn));	
		}

		

 
			
		?>



</table>
</body>
</html>