<?php
include 'database/db.php';
$id=$_GET['receiveid'];

	$sql="SELECT
				purchase_record_order.id,
				purchase_record_order.supplier_id,
				purchase_record_order.product_name,
				purchase_record_order.qty,
				purchase_record_order.size,
				purchase_record_order.location,
				purchase_record_order.receiver_name,
				purchase_record_order.order_id,
				supplier.supplier_id,
				supplier.`lastname/firstname/midname`,
				supplier.email,
				supplier.category_id,
				supplier.details,
				supplier.gender,
				supplier.address,
				category.categ_id,
				category.categ_name
				FROM
				purchase_record_order
				INNER JOIN supplier ON purchase_record_order.supplier_id = supplier.supplier_id
				INNER JOIN category ON supplier.category_id = category.categ_id
				 WHERE purchase_record_order.id=$id";
				$result=mysqli_query($conn,$sql);
				if($result->num_rows>0){
					while($row =$result->fetch_assoc()){

						$id=$row['id'];
						$order_id=$row['order_id'];
						$product_name=$row['product_name'];
						$qty=$row['qty'];
						$size=$row['size'];
						$receiver_name=$row['receiver_name'];
						$category=$row['categ_name'];
						$categ_id=$row['categ_id'];


					}

				}





?>

<?php
if(isset($_POST['submit'])){

	


	$ayde=$_POST['ayde'];
	$category=$_POST['category'];
	$pname=$_POST['name'];
	$size=$_POST['size'];
	$receiver=$_POST['receiver'];



$receive_qty=$_POST['rqty'];
	$qty=$_POST['oqty'];

	if($receive_qty<$qty){
		$total;
		$total=$receive_qty-$qty;
		echo $total;
		echo "KULANG";



	}if($receive_qty==$qty){
		
		$sql="INSERT INTO `stock_receive`( `receiver_name_id`, `category_id`, `product_id`, `product_name`, `qty`, `sizing`) VALUES ('$receiver','$category','$ayde','$pname','$receive_qty','$size')";
		$result=mysqli_query($conn,$sql);
		if($result){
			echo "GOOD BOOYYYY!!";
			header("location:rec_list.php");
		}else{
			die(mysqli_error($conn));
		}
	


	}
	if($receive_qty>$qty){
		$sum;
		$sum=$receive_qty-$qty;
		echo $sum;
		echo " ";
		//sobra
			$sql="INSERT INTO `stock_receive`( `receiver_name_id`, `category_id`, `product_id`, `product_name`, `qty`, `sizing`) VALUES ('$receiver','$category','$ayde','$pname','$qty','$size')";
		$result=mysqli_query($conn,$sql);
		if($result){
			echo "Sobra pero good booy!!";
			header("location:rec_list.php");
		}else{
			
			die(mysqli_error($conn));
		}


	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Receive</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
<form action="" method="POST">
<h1 class="my-5">RECEIVING</h1>



 <div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Order ID</label>
 

     <input type="text" name="ayde" class="form-control" value="<?php echo$order_id;?>" readonly>
    </div>

           <div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Category</label>
      <input type="hidden" name="category" class="form-control" value="<?php echo$categ_id;?>" readonly>
      <input type="text"  class="form-control" value="<?php echo$category;?>" readonly>
    
    </div>

     <div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Product Name</label>
     
     <input type="text" name="name" class="form-control" value="<?php echo$product_name;?>" readonly>
    </div>

 	<div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Order qty</label>
      <input type="text" name="oqty" class="form-control" value="<?php echo$qty;?>" readonly>
    </div>

     <div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Size</label>
      
       <input type="text" name="size" class="form-control" value="<?php echo$size;?>" readonly>
    </div>

         <div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Receiver Name</label>
    <input type="hidden" name="receiver" class="form-control" value="<?php echo$id;?>" readonly>
    <input type="text"  class="form-control" value="<?php echo$receiver_name;?>" readonly>
    </div>


  


    <div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Receive qty</label>
      <input type="number" id="disabledTextInput" class="form-control" name="rqty" >
    </div>
  

    <div class="my-3">
    <button class="btn btn-success" type="submit" name="submit"> Confirm</button>
    <button class="btn btn-secondary" type="submit" name="cancel"><a class="text-light" href="stock-receive.php">Cancel</a> </button>
	</div>

	</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>