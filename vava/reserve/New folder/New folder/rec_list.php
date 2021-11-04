<!DOCTYPE html>
<html>
<head>
	<title>Receive List</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>
<body>
<div class="container">
	<h1 class="text-center p-5">Receive List</h1>

	<table class="table table-bordered" id="tevol2">
  <thead class="table-dark">
    <tr>
    	<th>Product ID</th>
    	<th>Receive by:</th>
    	<th>Category</th>
    	<th>Product Name</th>
    	<th>Qty</th>
    	<th>Sizing</th>
    	<th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
     include 'database/db.php';

     $disp="SELECT
				stock_receive.receive_id,
				purchase_record_order.product_name,
				purchase_record_order.receiver_name,
				category.categ_name,
				stock_receive.product_id,
				stock_receive.product_name,
				stock_receive.qty,
				stock_receive.sizing,
				purchase_record_order.order_id
				FROM
				stock_receive
				INNER JOIN purchase_record_order ON stock_receive.receiver_name_id = purchase_record_order.id
				INNER JOIN category ON stock_receive.category_id = category.categ_id";

				$result=mysqli_query($conn,$disp);
				if($result->num_rows>0){
					while($row = $result-> fetch_assoc()){

						$id=$row['receive_id'];

						$order_id=$row['order_id'];
						$receiver_name=$row['receiver_name'];
						$categ_name=$row['categ_name'];
						$product_name=$row['product_name'];
						$qty=$row['qty'];
						$sizing=$row['sizing'];
					
						

						echo '

							<tr>
								<td>'.$order_id.'</td>
								<td>'.$receiver_name.'</td>
								<td>'.$categ_name.'</td>
								<td>'.$product_name.'</td>
								<td>'.$qty.'</td>
								<td>'.$sizing.'</td>
								


								<td>
																		
									 <button  class="btn btn-danger my-1" ><a class="text-light" href="rec_list.php?deleteid='.$id.'" >Delete</a></button>

								</td>


							

							</tr>



						';



					}


				}else{

					die(mysqli_error($conn));
				}

				if(isset($_GET['deleteid'])){
					$id=$_GET['deleteid'];

					$sql="DELETE FROM `stock_receive` WHERE receive_id=$id";
					$run=mysqli_query($conn,$sql);
					if($run){

						header('location:rec_list.php');
					}
					else{

						die(mysqli_error($conn));
					}




				}


    ?>
  </tbody>
</table>





</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>






<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>


<script>
	
	$(document).ready(function() {
    $('#tevol2').DataTable({

    	 "pagingType": "full_numbers",
      "lengthMenu":[

        [10,25,50,-1],
        [10,25,50,"All"]
      ],
      responsive: true,
      language:{

        search: "_INPUT_",
        searchPlaceholder: "Search Product",
      }


    	
    });
} );
</script>
</body>
</html>