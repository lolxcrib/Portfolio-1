<?php
include 'database/db.php';

$sql = "SELECT * FROM `stock`";
$sql_run=mysqli_query($conn,$sql);


?>


<!DOCTYPE html>
<html>
<head>
	<title>Stock Release</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<br>
<br>
<h1>Stock Release</h1>
<form action="" method="POST">
<select name="id">
		<option>-----</option>

	<?php
	
	  while($rows = mysqli_fetch_array($sql_run)){

		?>

		<option value="<?php echo $rows['id']; ?> "> <?php echo $rows['product_name']; ?> </option>
		<?php
	}
	?>
	
	</select>
<!--<input type="text" name="pr_id" placeholder="Enter product " value="<?php //if(isset($_GET['pr_id'])){ echo $_GET['pr_id']; }   ?>">-->
<button >Search</button>
<br>
<br>
<hr>

<?php
include 'database/db.php';

if(isset($_POST['id'])){
    
    $pr_id=$_POST['id'];


	$query = "SELECT * FROM stock WHERE stock.id = $pr_id";
	$q_run = mysqli_query($conn, $query);

	if(mysqli_num_rows($q_run)>0)
	{
		foreach($q_run as $row)


		{
    
?>
<label>Customer Name</label>
<input type="text" name="customer">
 
	<LABEL>Stocks Available</LABEL>

	<input type="text" name="qty" value="<?= $row ['qty'] ?>" readonly>
	<label>Price</label>
	<input type="text" name="price" value="<?= $row ['prc'] ?>" readonly>
	<label>Quantity</label>
	<input type="text" name="release" placeholder="release qty">
	<input type="submit" name="submit">



<?php





if(isset($_POST['submit'])){

$product=$_POST['id'];
$qty=$_POST['qty'];
$release=$_POST['release'];
$price=$_POST['price'];
$name=$_POST['customer'];
$sum=$qty-$release;
$sale=$release*$price;
//echo "Remaining Quantity";
//echo $sum;
//echo "Total amount of sales";
//echo $sale;

if($release>$qty){

	echo "WARNING!!! YOUR RELEASE IS GREATER THAN STOCK AVAILABILITY";
}else{

	$release="INSERT INTO `stock_release`(`customer_name`,`stock_id`, `qty`) VALUES ('$name','$product','$release')";
	$run_r=mysqli_query($conn,$release);
	if($run_r){
		$sale="INSERT INTO `sales`(`product_id`, `customer_name`, `sale`) VALUES ('$product','$name','$sale')";
		$run_sale=mysqli_query($conn,$sale);
		if($run_sale){
		
			if(isset($_POST['submit'])){
		
				$id=$_POST['id'];
				$qty=$_POST['qty'];
		$sql= "UPDATE `stock` SET `id`=$id,`qty`=$sum where id=$id";
		$rs=mysqli_query($conn,$sql);
		if($rs){

			echo "Data Release Successfully!!!!";
		}else{
			die(mysqli_error($conn));
		}


			}

			
		}else{
			die(mysqli_error($conn));
		}

	}else{
		die(mysqli_error($conn));
	}


}


}



?>




<?php 
		}

	}else{

		echo "No record found";
	}
}

?>

<br>
<br>
<!--<label>From:</label>
<input type="date" name="">
<label>From:</label>
<input type="date" name="">
<input type="submit" placeholder="SUBMIT">-->


</form>
<center>
<table class="content-table">
	<tr>
		<th>#---</th>
		<th>Customer Name---</th>
		<th>Product Name---</th>
		<th>Qty ---</th>
		<th>Action ---</th>
		
	</tr>
<?php

$sql="SELECT stock_release.release_id, stock_release.customer_name, stock.product_name, stock_release.qty FROM stock_release INNER JOIN stock ON stock_release.stock_id = stock.id order by release_id asc";
$run=mysqli_query($conn,$sql);

if($run->num_rows>0){
	while ($row = $run->fetch_assoc()){

		$id=$row['release_id'];
		$name=$row['customer_name'];
		$product_name=$row['product_name'];
		$qty=$row['qty'];

		echo '<tr>
			<td>'.$id.'</td>
			<td>'.$name.'</td>
			<td>'.$product_name.'</td>
			<td>'.$qty.'</td>

			<td>
			<button><a href="stock-release.php?deleteid='.$id.'">Delete</a></button>
			</td>

			</tr>';




	}

}else{

	die(mysqli_error($conn));
}

if(isset($_GET['deleteid'])){

$id=$_GET['deleteid'];

$sql="DELETE FROM `stock_release` WHERE release_id=$id";
$run=mysqli_query($conn,$sql);

if($run){

	echo "DELETED SUCCESSFULLY!!";

	header('location:stock-release.php');
}else{

	die(mysqli_error($conn));
}



}




?>



</table>

</center>

</body>
</html>