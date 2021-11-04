<?php
$id=$_GET['updateid'];
include 'database/db.php';

 $sql1="SELECT * FROM `category`";
  $runs=mysqli_query($conn,$sql1);


$sql="SELECT
            supplier.`lastname/firstname/midname`,
            supplier.email,
            category.categ_name,
            supplier.details,
            supplier.gender,
            supplier.address,
            supplier.supplier_id,
            category.categ_id
            FROM
            supplier
            INNER JOIN category ON supplier.category_id = category.categ_id
                         WHERE supplier.supplier_id=$id";

$result=mysqli_query($conn,$sql);

if($result->num_rows>0){
	while ($row=$result->fetch_assoc()){
		$id=$row['supplier_id'];
		$name=$row['lastname/firstname/midname'];
		$email=$row['email'];
		$category=$row['categ_name'];
		$details=$row['details'];
		$gender=$row['gender'];
		$address=$row['address'];
    $categ_id=$row['categ_id'];



	}

}

?>

<?php

if(isset($_POST['submit'])){

	$name=$_POST['name'];
	$email=$_POST['email'];
	$category=$_POST['category'];
	$details=$_POST['details'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];


	$update="UPDATE `supplier` SET `supplier_id`=$id,`lastname/firstname/midname`='$name',`email`='$email',`category_id`=$category,`details`='$details',`gender`='$gender',`address`='$address' WHERE supplier_id=$id";

		$result=mysqli_query($conn,$update);

		if($result){

			echo "UPDATED!!";
			header("location:supplier.php");
			//session
		}else{
			die(mysqli_error($conn));
		}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Supplier Information</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
<div class="container">
<form class="row g-3" action="" method="POST">


	<h1 class="text-center my-3">Supplier Informations</h1>	

	<div class="col-md-3">
    <label for="inputEmail4" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="inputEmail4" name="name" value="<?php echo$name;?>">
    <div class="form-text">Last name/Middle name/ First name</div>
  </div>

  <div class="col-md-3">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo$email; ?>">

  </div>



   <div class="col-md-3">
    <label for="inputEmail4" class="form-label">Category</label>
    <select class="form-select" name="category">
      
       <option value="<?php echo$categ_id; ?>"> <?php echo$category; ?></option>
        <?php

           while($rows=mysqli_fetch_array($runs)){
            ?>

            <option value="<?php echo$rows['categ_id']; ?>"><?php echo$rows['categ_name']; ?></option>
            <?php
           }


           ?>

    </select>
  </div>




 <div class="col-md-3">
    <label for="inputEmail4" class="form-label">Details</label>
    <textarea class="form-control" name="details" value="<?php echo $details; ?>"><?php echo $details ?></textarea>
   
  </div>

 <div class="col-md-2">
    <label for="inputEmail4" class="form-label">Gender</label>
    <select class="form-select" name="gender">
    <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
    	<option>Male</option>
    	<option>Female</option>

    </select>
   
  </div>

   <div class="col-md-5">
    <label for="inputEmail4" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputEmail4" name="address" value="<?php echo $address; ?>">
   <div class="form-text">House/Building/Street Number, Street Name. Barangay/District Name, City/Municipality.</div>
  </div>


<div class="col-12">
    <button type="submit" class="btn btn-dark" name="submit">Update</button>
    <button type="submit" class="btn btn-danger" name="cancel" >Cancel</button>
  </div>
<?php
if(isset($_POST['cancel'])){
	header('location:supplier.php');
}
?>


</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>