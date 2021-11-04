<?php include 'database/db.php'; 
	  include 'try.php';


	  $currentd=date("Y-m-d");
	 
	$sql="SELECT * FROM `account_payable` WHERE reminder='$currentd'";

	$result= mysqli_query($conn, $sql);

	while($rows=mysqli_fetch_array($result)){

		$name=$rows['payable_name'];

		//echo "$name <br>";

		$sql="INSERT INTO `notif`( `logs`) VALUES ('$name')";
		$run=mysqli_query($conn,$sql);

		if($run){

		}else{
		die(mysqli_error($conn));
		}

	}

?>

<?php


$sql="SELECT * FROM `category_payable`";
$run=mysqli_query($conn,$sql);

if(isset($_POST['submit'])){

$category=$_POST['category'];
$name=$_POST['name'];
$bill=$_POST['bill'];
$date=$_POST['from'];
$due=$_POST['to'];
$details=$_POST['details'];
$reminder=$_POST['reminder'];


$sql1="INSERT INTO `account_payable`( `categ_id`, `payable_name`, `bill`, `date`, `due_date`,`reminder`, `description`) VALUES ('$category','$name','$bill','$date','$due','$reminder','$details')";

$rs=mysqli_query($conn,$sql1);

if($rs){
	//echo "SUCCESSFULLY INSERTED!!!";



}else{

	die(mysqli_error($conn));
}



}


?>





<!DOCTYPE html>
<html>
<head>
	<title>Account Payables</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<style type="text/css">
  			.table{

  				border: 2px black solid; box-shadow: 5px 5px 8px grey;
  			}
  			.table tr{transition: all .2s ease-in;cursor: pointer;}
  			.table tbody tr:nth-child(even){background: #EDEDED;}
			.table tbody tr:hover{background-color: #969698;transform: translate(1.02);}

  		</style>	
</head>
<body>
<div class="container">

<h1 class="text-center" style="font-family: Bodoni MT Black; color: #0049FF;text-shadow: 10px 10px 20px black; font-size: 100px;"> Account Payable</h1>

<?php

if(isset($_POST['addcateg'])){

	$category=$_POST['category'];

	$sql="INSERT INTO `category_payable`(`categ_name`) VALUES ('$category')";
	$result=mysqli_query($conn,$sql);
	
}


?>

<form action="" method="POST">

<!-- Modal -->

		<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">


		      	<label class="form-label">Category</label>
		      	<input type="text" name="category" class="form-control">





		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="Submit" class="btn btn-dark" name="addcateg">Submit</button>
		      </div>
		    </div>
		  </div>
		</div>




<!-- End MOdal -->
</form>

<form action="" method="POST">

<!-- Modal -->
<div class="modal fade" id="addexpense" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Payable</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       


			    
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Category</label>
			    <select class="form-select" name="category">
			    	
			    	<?php

			    	while($rows=mysqli_fetch_array($run)){

			    		?>
			    		<option value="<?php echo $rows['id']; ?>">  <?php echo $rows['categ_name']; ?></option>
			    	<?php	
			    	}

			    	?>


			    </select>
			   	
			  </div>

			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Payable Name</label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="name">
			  </div>

			<div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Bill</label>
			    <input type="text" class="form-control" id="exampleInputPassword1" name="bill">
			  </div>

			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Date issued</label>
			    <input type="date" class="form-control" id="exampleInputPassword1" name="from">
			  </div>
			 	
			<div class="mb-3">

			    <label for="exampleInputPassword1" class="form-label">Due Date</label>
			    <input type="date" class="form-control" id="exampleInputPassword1" name="to">

			  </div>


			  <div class="mb-3">

			    <label for="exampleInputPassword1" class="form-label">Set reminder</label>
			    <input type="date" class="form-control" id="exampleInputPassword1" name="reminder">

			  </div>


		


			<div class="mb-3">
			  <label for="exampleFormControlTextarea1" class="form-label">More Details</label>
			  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="details"></textarea>
			</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- End -->





<div class="my-3">

	<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addexpense">
  Add Expenses
</button>

	<button type="button" class="btn btn-dark addcategory">Add Category
  
</button>
</div>
	

<?php 

if(isset($_POST['add'])){

	header('location:payable_categ.php');
}

?>



	
</form>





<table class="table my-4" id="tebol2">
  <thead class="table-dark">
    <tr>
    	<th>#</th>
    	<th>CATEGORY</th>
    	<th>PAYABLE</th>
    	<th>BILL</th>
    	<th>DATE ISSUED</th>
    	<th>DUE DATE</th>
    	<th>Details</th>
    	<th>ACTION</th>


    </tr>
  </thead>
  <tbody>
   <?php

   $sql="SELECT
				account_payable.id,
				category_payable.categ_name,
				account_payable.payable_name,
				account_payable.bill,
				account_payable.date,
				account_payable.due_date,
				account_payable.description
				FROM
				account_payable
				INNER JOIN category_payable ON account_payable.categ_id = category_payable.id";


				$result=mysqli_query($conn,$sql);
				if($result->num_rows>0){

					while($row =$result->fetch_assoc()){
						$id=$row['id'];

						$category=$row['categ_name'];
						$name=$row['payable_name'];
						$bill=$row['bill'];
						$date=$row['date'];
						$due=$row['due_date'];
						$details=$row['description'];

						echo '


						   <tr>

   								<td>'.$id.'</td>
   								<td>'.$category.'</td>
   								<td>'.$name.'</td>
   								<td>'.$bill.'</td>
   								<td>'.$date.'</td>
   								<td>'.$due.'</td>
   								<td>'.$details.'</td>


   								<td>
								<button class="btn btn-secondary"><a class="text-light" href="pay_update.php?updateid='.$id.'"> Update</a></button>
								<button class="btn btn-danger"><a class="text-light" href="pay_del.php?deleteid='.$id.'"> Delete</a></button>

								</td>		


 							 </tr>

						';


					}


				}else{

					die(mysqli_error($conn));
				}





   ?>


  </tbody>
</table>
















</div>





<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>



<script>
	$(document).ready(function(){

		$('.addcategory').on('click',function(){
			$('#add').modal('show');


			$tr =$(this).closest('tr');

			var data= $tr.children("td").map(function(){

				return $(this).text();
			}).get();


			console.log(data);

			$('#update_id').val(data[0]);
			$('#cat').val(data[1]);



		});
	});





</script>

<script>
	
	$(document).ready(function() {
    $('#tebol2').DataTable({

    	 "pagingType": "full_numbers",
      "lengthMenu":[

        [10,25,50,-1],
        [10,25,50,"All"]
      ],
      responsive: true,
      language:{

        search: "_INPUT_",
        searchPlaceholder: "Search ",
      }


    	
    });
} );
</script>



</body>
</html>