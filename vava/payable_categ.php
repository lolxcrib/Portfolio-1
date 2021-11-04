<?php
session_start();
include 'database/db.php';

if(isset($_POST['submit'])){

	$category = $_POST['category'];

	$sql ="SELECT * FROM category_payable WHERE categ_name='$category'";

$result=mysqli_query($conn,$sql);


if (!$result->num_rows>0){
	$sql= "insert into category_payable(categ_name) values('$category')";
	$result = mysqli_query($conn, $sql);
	if($result){
		//echo "Inserted Succesfully";

		$_SESSION['insert'] = "INSERTED SUCESSFULLY!!!";

	}else{

		//echo "Woops! Something Wrong Went";

	}
}else{

	//echo "Woops! Data Already EXist";
	$_SESSION['lmt'] = "ALREADY EXIST!!!";

}



}


?>



<!DOCTYPE html>
<html>
<head>
  <title>Category</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<div class="container">  
  
<h1 class="text-center my-5"> Add Category</h1>

       <?php
      if(isset($_SESSION['delete'])){
      	?>
      	<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>CANNOT BE DELETED !!!</strong> <?php echo $_SESSION['delete']; ?>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
      	<?php
      	
      	unset($_SESSION['delete']);
      }



      ?>

            <?php
      if(isset($_SESSION['success'])){
      	?>
      	<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>DATA!!!</strong> <?php echo $_SESSION['success']; ?>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
      	<?php
      	
      	unset($_SESSION['success']);
      }



      ?>


                  <?php
      if(isset($_SESSION['insert'])){
      	?>
      	<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>DATA!!!</strong> <?php echo $_SESSION['insert']; ?>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
      	<?php
      	
      	unset($_SESSION['insert']);
      }



      ?>

                   <?php
      if(isset($_SESSION['lmt'])){
      	?>
      	<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>DATA!!!</strong> <?php echo $_SESSION['lmt']; ?>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
      	<?php
      	
      	unset($_SESSION['lmt']);
      }



      ?>

<form action="" method="POST">

<!-- Modal -->

		<div class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">

		      	<label class="form-label">Category</label>
		      	<input class="form-control" name="category" required>





		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="Submit" class="btn btn-dark" name="submit">Submit</button>
		      </div>
		    </div>
		  </div>
		</div>




<!-- End MOdal -->












<div class="my-3">
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#category">
  Add Category
</button>
<button class="btn btn-secondary"><a class="text-light" href="payable.php"> Back</a></button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>



</form>

<script>

	
	$(document).ready(function() {
    $('#tebol3').DataTable({

    	 "pagingType": "full_numbers",
      "lengthMenu":[

        [10,25,50,-1],
        [10,25,50,"All"]
      ],
      responsive: true,
      language:{

        search: "_INPUT_",
        searchPlaceholder: "Search",
      }


    	
    });
} );
</script>





 <table class="table my-5" id="tebol3">
 	<thead class="table-dark">
 		<tr>
 			<th>Category #</th>
 			<th>Category Name</th>
 			<th> Action</th>

 		</tr>


 	</thead>



 	<tbody>
 		
 	<?php

 	$sql="SELECT * from category_payable order by id asc";
 	$result = $conn->query($sql);
 	if($result->num_rows > 0){

			while ($row = $result-> fetch_assoc()){

			$id=$row['id'];
			$category=$row['categ_name'];

			echo '<tr>
			<td>'.$id.'</td>
			<td>'.$category.'</td>

			<td>
			<button class="btn btn-dark"><a class="text-light" href="pay_up.php?updateid='.$id.'">Update</a></button>
			<button class="btn btn-secondary"><a class="text-light" href="payable_categ.php?deleteid='.$id.'">Delete</a></button>
			
			</td>


			</tr>';
				
			}
		}else{

			die(mysqli_error($conn));	




		}
			if(isset($_GET['deleteid'])){

				$id=$_GET['deleteid'];


				$sql="delete from `category_payable` where id=$id";
				$result=mysqli_query($conn,$sql);

				if($result){

					//echo "Deleted Succesfull";
					$_SESSION['success'] = "SUCCESSFULLY DELETED";
					header('location: payable_categ.php');


				}else{

					//die(mysqli_error($conn));

					$_SESSION['delete'] = "SOME DATA STORED IN THIS CATEGORY";
					header('location: payable_categ.php');
				}

			}



 	?>

 		
 	</tbody>
</table> 

  
</div>
 
</body>
</html>