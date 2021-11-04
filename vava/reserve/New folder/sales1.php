<?php include 'database/db.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sales Report</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>
<body>
<div class="container">	
<form action="" method="POST">	
		<h1 class="my-5">Sales Report</h1>

		<div class="row g-1">
  <div class="col-md-2">
  	<label class="form-label">From </label>
    <input type="date" class="form-control" name="from" value="<?php if(isset($_POST['from'])){echo $_POST['from'];} ?>" >
  </div>
  <div class="col-md-2">
  <label class="form-label">To </label>
    <input type="date" class="form-control" name="to" value="<?php if(isset($_POST['to'])){echo $_POST['to'];}?>" >

  </div>

</div>
<button class="btn btn-dark my-3" type="submit" name="submit">Filter</button>






<div class="table-responsive">
  <table class="table" id="tebol00">
   <thead class="table-dark">	
   	<tr>
		<th>#</th>
		
		<th>Product Name</th>

		<th>Sales</th>
		<th>Date/Time</th>
		<th>Action</th>
	</tr>

   </thead>
   <tbody>	


<?php
include 'database/db.php';


if(isset($_POST['submit'])){

 
 
	$from=$_POST['from'];
    $to=$_POST['to'];

	$sql="SELECT sales.sales_id, stock.product_name, sales.customer_name, sales.sale, sales.dates FROM sales INNER JOIN stock ON sales.product_id = stock.id WHERE dates BETWEEN '$from' AND '$to' order by sales_id asc";
 

	$run=mysqli_query($conn,$sql);
	if(mysqli_num_rows ($run)>0){

		foreach($run as $row){
			//echo $row['product_name'];
			$id=$row['sales_id'];

			?>
				<tr>

					<td><?= $row['sales_id']; ?></td>
					
					<td><?= $row['product_name'];?></td>
					<td><?= $row['sale'];?></td>
					<td><?= $row['dates'];?></td>
				
					
				</tr>
				<?php
					echo '
					<tr>
					<td>
						<button class="btn btn-dark"><a href="sales.php?deleteid='.$id.'">Delete</a></button>
					</td>
					</tr>
		';
	?>


			
<?php

		
		}



	}else{
		echo "NO record Found";
	}
}

if(isset($_GET['deleteid'])){

$id=$_GET['deleteid'];

$sql="DELETE FROM `sales` WHERE sales_id=$id";
$rs=mysqli_query($conn,$sql);

if($rs){
	echo "deleted";
}else{
	die(mysqli_error($conn));
}


}

?>

<?php

if(isset($_POST['submit'])){

 
 
	$from=$_POST['from'];
    $to=$_POST['to'];

	$sql="SELECT
				Sum(sales.sale) AS total
				FROM
				sales
				WHERE
				sales.dates BETWEEN '$from' AND '$to'";
 

	$run=mysqli_query($conn,$sql);
	if(mysqli_num_rows ($run)>0){

		foreach($run as $row){
			//echo $row['product_name'];

			?>
				<tr>

					<td> Total Sales:<?= $row['total']; ?></td>
			
					

				</tr>
				
			
			<?php

		
		}


	}else{
		echo "NO record Found";
	}
}

?>




   </tbody>


  </table>

</div>














</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>

  
  $(document).ready(function() {
    $('#tebol00').DataTable({

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

</body>
</html>