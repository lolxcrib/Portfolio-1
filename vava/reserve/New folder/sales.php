<?php include 'database/db.php'; ?>
<?php
$sql="SELECT
				Sum(sales.sale) AS total
				FROM
				sales
				WHERE
				sales.dates";
				$result=mysqli_query($conn,$sql);
				if($result->num_rows>0){
					while ($row=$result->fetch_assoc()) {
						$total=$row['total'];
					}
				}




?>
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

		<button class="btn btn-dark my-4"><a class="text-light" href="javascript:Clickheretoprint()"> Print</button></a>





<div class="table-responsive" id="content">
  <table class="table" id="tebol00">
   <thead class="table-dark">	
   	<tr>
		<th>#</th>
		
		<th>Product Name</th>

		<th>Sales</th>
		<th>Date/Time</th>
		
	</tr>

   </thead>
   <tbody>	
<?php
$sql="SELECT stock.product_name, sales.sale, sales.dates, sales.sales_id FROM sales INNER JOIN stock ON sales.product_id = stock.id";
$run=mysqli_query($conn,$sql);
if($run->num_rows>0){
	while($row=$run->fetch_assoc()){

		$id=$row['sales_id'];
		$product=$row['product_name'];
		$sale=$row['sale'];
		$date=$row['dates'];


		echo '

		<tr>
		<td>'.$product.'</td>
	<td>'.$product.'</td>

	<td>'.$sale.'</td>
	<td>'.$date.'</td>


</tr>




		';


	}
}

?>




   </tbody>


  </table>
<div class="form-text"><h1> Total Sales <b><?php echo $total; ?></b></h1> </div>
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



<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

</body>
</html>