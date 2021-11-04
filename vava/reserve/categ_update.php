<?php
session_start();
include 'database/db.php';
	$id=$_GET['updateid'];


	$sql="select * from `category` where categ_id=$id";
	$run= mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($run);
	$category=$row['categ_name'];

if(isset($_POST['submit'])){

	$category=$_POST["category"];	
	$sql ="SELECT * FROM category WHERE categ_name='$category'";
	$result=mysqli_query($conn,$sql);

	if (!$result->num_rows>0){
		
		$query = "UPDATE `category` SET `categ_id`=$id,`categ_name`='$category' where `categ_id`=$id";

			$run = mysqli_query($conn,$query);
			if($run){

		//echo"Success";

			


	        header('location:category.php');
	}
	else{
		die(mysqli_error($conn));

	}


	}else{


		//echo "Woops! Data Already EXist";
		$_SESSION['exist'] = "ALREADY EXIST!!!";
		

	}

	}//submit

?>
<?php
if(isset($_POST['submit1'])){
	header('location:category.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Vallendar Monitoring System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


	
</head>
		
<body>
		<div class="container my-5">

	<?php
      if(isset($_SESSION['exist'])){
      	?>
      	<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>DATA !!!</strong> <?php echo $_SESSION['exist']; ?>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
      	<?php
      	
      	unset($_SESSION['exist']);

      }



      ?>


					<form action="" method="POST">


				 <div class="col-md-4">	
				
				 <label class="form-label">Update Category</label>
				<!--<input class="form-control" type="text" name="category value="<?php  //echo $row['categ_name']; ?>-->
				<input type="text" name="category" class="form-control" value="<?php  echo $row['categ_name']; ?>">
			</div>	




						<div class="col-12 my-4"> 

				<input type="submit" name="submit" value="UPDATE" class="btn btn-primary" id="submit">
				<input type="submit" name="submit1" value="CANCEL" class="btn btn-secondary" id="submit">

							</div>


				</form>

				</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>