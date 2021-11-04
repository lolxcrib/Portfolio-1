<?php
include 'database/db.php';
?>
<?php

//for supplier
$sql="SELECT * FROM `supplier`";
$run=mysqli_query($conn,$sql);
//for category
$sql1="SELECT * FROM `category`";
$s_run=mysqli_query($conn,$sql1);
/////////////////////////
$id=$_GET['updateid'];
$dip="SELECT * FROM `purchase_record_order` WHERE id=$id";
$rs=mysqli_query($conn,$dip);
$row=mysqli_fetch_assoc($rs);

$pname=$row['product_name'];
$place=$row['place_order'];
$receiver=$row['receiver_name'];

if(isset($_POST['submit'])){

	$supplier=$_POST['supp'];
	$cat=$_POST['cat'];
	$pname=$_POST['pname'];
	$place=$_POST['place'];
	$receive=$_POST['receive'];

	$sql="UPDATE `purchase_record_order` SET `id`=$id,`supp_id`=$supplier,`category_id`=$cat,`product_name`='$pname',`place_order`='$place',`receiver_name`='$receive' WHERE id=$id";

	$run = mysqli_query($conn, $sql);
	if($run){
		//echo "UPDATED";
		header('location: po.php');
	}else{
		die(mysqli_error($conn));
	}



}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>PURCHASE ORDER</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>Purchase Order Record</h1>
<form action="" method="POST">
<label>Supplier Name</label>
<select name="supp" >
	
	<?php
		while($rows = mysqli_fetch_array($run)){

			?>

			<option value="<?php echo $rows ['supplier_id']; ?> "> <?php echo $rows['name']; echo " "; echo $rows['midname']; echo " ";  echo $rows['lastname']; ?> </option>


			<?php

		}
	?>

</select><br><br>  


<label>Product Category</label>
<select name="cat">
	
	<?php

	while($rows = mysqli_fetch_array($s_run)){

		?>

		<option value="<?php echo $rows['categ_id']; ?>"><?php echo $rows['categ_name']; ?></option>

		<?php
	}


	?>
</select><br><br>

<label>Product Name</label>
<input type="text" name="pname" value="<?php echo $pname; ?>"><br><br>
<label>Placed Order</label>
<input type="text" name="place" value="<?php echo $place; ?>"><br><br>
<label>Receiver Name</label>
<input type="text" name="receive" value="<?php echo $receiver; ?>"><br><br>

<input type="submit" name="submit" value="Save">
</form>





</body>
</html>