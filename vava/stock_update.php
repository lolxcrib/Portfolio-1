<?php include 'database/db.php'; ?>

<?php
$id=$_GET['updateid'];
if(isset($_POST['cancel'])){

	header('location:stocks.php');
}

?>


<?php

      $sql="SELECT
                  stock.id,
                  stock.product_id,
                  stock.category_id,
                  stock.product_name,
                  stock.qty,
                  stock.sizing,
                  stock.description,
                  stock.prc,
                  category.categ_id,
                  category.categ_name
                  FROM
                  stock
                  INNER JOIN category ON stock.category_id = category.categ_id WHERE stock.id=$id";

$result=mysqli_query($conn,$sql);

if($result->num_rows>0){

  while ($row=$result->fetch_assoc()){

    $id=$row['id'];
    $categ_id=$row['categ_id'];
    $category=$row['categ_name'];
    $product_id=$row['product_id'];
    $product_name=$row['product_name'];
    $qty=$row['qty'];
    $sizing=$row['sizing'];
    $description=$row['description'];
    $price=$row['prc'];



  }


}

$sql="SELECT * FROM `category`";
$rs=mysqli_query($conn,$sql);
///////////////////////////////////

if(isset($_POST['submit'])){

  $category=$_POST['category'];
  $product_id=$_POST['product_id'];
  $product_name=$_POST['product_name'];
  $qty=$_POST['qty'];
  $sizing=$_POST['size'];
  $description=$_POST['description'];
  $price=$_POST['price'];


  $sql="UPDATE `stock` SET `id`=$id,`product_name`='$product_name',`qty`=$qty,`sizing`='$sizing',`description`='$description',`prc`=$price ,`category_id`=$category,`product_id`='$product_id' WHERE id=$id";

    $result = mysqli_query($conn, $sql);
  if($result){    

    echo "UPDATED successfully";
    header('location: stocks.php');

  }else{

    die(mysqli_error($conn));
  }


}




?>



<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container my-5">
	<form class="row g-4" action="" method="POST">
		
	<h1 class="text-center"> UPDATE</h1>
	 <div class="col-md-4">
    <label  class="form-label">Category</label>
    <select class="form-select" name="category">

      <option value="<?php echo$categ_id; ?>"><?php echo$category; ?></option>
      <?php
      while ($rows=mysqli_fetch_array($rs)){

        ?>
        <option value="<?php echo$rows['categ_id']; ?>"><?php echo$rows['categ_name']; ?></option>
        <?php
      }
      ?>
    </select>
 	</div>

 <div class="col-md-4">
    <label  class="form-label">Product ID</label>
    <input type="text" class="form-control" id="inputEmail4" name="product_id" value="<?php echo $product_id; ?>">
  </div>

<div class="col-md-4">
    <label  class="form-label">Product Name</label>
    <input type="text" class="form-control" id="inputEmail4" name="product_name" value="<?php echo $product_name; ?>">
  </div>

  <div class="col-md-4">
    <label  class="form-label">Qty</label>
    <input type="number" class="form-control" id="inputEmail4" name="qty" value="<?php echo $qty; ?>">
  </div>

<div class="col-md-4">
    <label  class="form-label">Sizing</label>
    <input type="text" class="form-control" id="inputEmail4" name="size" value="<?php echo$sizing ?>">
  </div>

  <div class="col-md-4">
    <label  class="form-label">Description</label>
    <textarea class="form-control" name="description" value="<?php echo $description; ?>"><?php echo $description; ?></textarea>
  </div>

  <div class="col-md-4">
    <label  class="form-label">Price</label>
    <input type="text" class="form-control" id="inputEmail4" name="price" value="<?php echo $price; ?>">
  </div>



    <div class="col-12">
    <button type="submit" class="btn btn-dark" name="submit">Update</button>
    <button type="submit" class="btn btn-danger" name="cancel" >Cancel</button>
  </div>

	</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>