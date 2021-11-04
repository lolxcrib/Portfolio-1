<!DOCTYPE html>
<html>
<head>
	<title>Sales</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<h1>SALES</h1>
<form action="" method="GET">

<label>BETWEEN FROM</label>	
<input type="date" name="from" value="<?php if(isset($_GET['from'])){echo $_GET['from'];} ?>" >
<label>To</label>
<input type="date" name="to" value="<?php if(isset($_GET['to'])){echo $_GET['to'];}?>">
<button>Filter</button>


</form>

<form method="POST">
	<input type="submit" name="report" value="Print">




<table class="content-table">
<thead>
	<tr>
		<th>#---</th>
		<th>Customer Name-----</th>
		<th>Product Name---</th>

		<th>Sales---</th>
		<th>Date/Time---</th>
	</tr>
</thead>
<tbody>
	

<?php
include 'database/db.php';


if(isset($_GET['from']) && isset($_GET['to'])){

 
 
	$from=$_GET['from'];
    $to=$_GET['to'];

	$sql="SELECT sales.sales_id, stock.product_name, sales.customer_name, sales.sale, sales.dates FROM sales INNER JOIN stock ON sales.product_id = stock.id WHERE dates BETWEEN '$from' AND '$to' order by sales_id asc";
 

	$run=mysqli_query($conn,$sql);
	if(mysqli_num_rows ($run)>0){

		foreach($run as $row){
			//echo $row['product_name'];

			?>
				<tr>

					<td><?= $row['sales_id']; ?></td>
					<td><?= $row['customer_name']; ?></td>
					<td><?= $row['product_name'];?></td>
					<td><?= $row['sale'];?></td>
					<td><?= $row['dates'];?></td>
					

				</tr>
			
			<?php

		
		}


	}else{
		echo "NO record Found";
	}
}

?>
<?php

if(isset($_GET['from']) && isset($_GET['to'])){

 
 
	$from=$_GET['from'];
    $to=$_GET['to'];

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
</form>
</body>
</html>