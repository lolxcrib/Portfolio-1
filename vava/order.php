<?php
include 'database/db.php';
include 'dashboard.php';
$fname=$_SESSION['lastname/firstname/midname'];

?>
<?php
$id=$_GET['orderid'];


$sql="SELECT
                  supplier.`lastname/firstname/midname`,
                  supplier.email,
                  category.categ_name,
                  supplier.details,
                  supplier.gender,
                  supplier.address,
                  supplier.supplier_id
                  FROM
                  supplier
                  INNER JOIN category ON supplier.category_id = category.categ_id

                  WHERE supplier_id=$id";

$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
  while ($row=$result->fetch_assoc()) {
      $id=$row['supplier_id'];
  
      $name=$row['lastname/firstname/midname'];
      $supply=$row['categ_name'];
      $address=$row['address'];
      $details=$row['details'];




  }
}


?>
<?php

if(isset($_POST['submit'])){

  $supplier=$_POST['supplier'];
  $name=$_POST['name'];
  $troy=$_POST['troy'];
  $qty=$_POST['qty'];
  $size=$_POST['size'];
  $drop=$_POST['drop'];

  $ins="INSERT INTO `purchase_record_order`( `supplier_id`, `product_name`, `qty`, `size`, `location`, `receiver_name`, `order_id`) VALUES ('$supplier','$name','$qty','$size','$drop','$fname','$troy')";
  $rs=mysqli_query($conn,$ins);
  if($rs){
    header('Location: po.php');
  }else{
    die(mysqli_error($conn));
  }

}

?>





<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
		<h1 class=" my-5">Order Information</h1>

<form action="" method="POST">



 
   
    <div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Supplier name</label>
      <select name="supplier" class="form-select"  id="disabledSelect">
        <option value="<?php echo$id;?>" > <?php echo$name; ?></option>


      </select>
    </div>
 <fieldset disabled>
    <div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Category</label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo$supply;?>"  name="supply">
    </div>

	<div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Address</label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?php echo$address;?>"  name="address">
    </div>

    <div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Details</label>
      <textarea class="form-control" id="disabledTextArea"  name="details" value="<?php echo$details;?>"><?php echo$details;?> </textarea>

     
    </div>

  </fieldset>




    <div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Product Name</label>
      <input type="text" id="disabledTextInput" class="form-control" name="name">
    </div>

   <div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Order ID</label>
      <input type="text" name="troy"  class="form-control">
    </div>


  	<div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Quantity</label>
      <input type="number" id="disabledTextInput" class="form-control" name="qty">
    </div>





    	<div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Size</label>
      <input type="text" id="disabledTextInput" class="form-control" name="size">
    </div>

      	<div class="col-md-3">
      <label for="disabledTextInput" class="form-label">Drop off location</label>
      <input type="text" id="disabledTextInput" class="form-control" name="drop">
    </div>


    <div class="my-3">
    <button class="btn btn-success" type="submit" name="submit"> Confirm</button>
    <button class="btn btn-secondary" type="submit" name="cancel"><a class="text-light" href="po.php">Cancel</a> </button>
</div>
</form>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

