<!DOCTYPE html>
<html>
<head>
	<title>Stock Receiving</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>
<body>
<div class="container">


<h1 class="text-center my-4">Stock Receiving</h1>

	<table class="table" id="tebol001">
  <thead class="table-dark">
   	<tr>
   		<th>Order ID</th>
   		<th>Product Name</th>
   		<th>Ordered qty</th>
   		<th>Sizing</th>
   		<th>Receiver</th>
   		<th>Operation</th>

   	</tr>
  </thead>
  <tbody>
    <?php
    include 'database/db.php';
    $sql="SELECT
				purchase_record_order.id,
				purchase_record_order.supplier_id,
				purchase_record_order.product_name,
				purchase_record_order.qty,
				purchase_record_order.size,
				purchase_record_order.location,
				purchase_record_order.receiver_name,
				purchase_record_order.order_id,
				supplier.supplier_id,
				supplier.`lastname/firstname/midname`,
				supplier.email,
				supplier.category_id,
				supplier.details,
				supplier.gender,
				supplier.address
				FROM
				purchase_record_order
				INNER JOIN supplier ON purchase_record_order.supplier_id = supplier.supplier_id";
				$result=mysqli_query($conn,$sql);
				if($result->num_rows>0){
					while($row =$result->fetch_assoc()){

						$id=$row['id'];
						$order_id=$row['order_id'];
						$product_name=$row['product_name'];
						$qty=$row['qty'];
						$size=$row['size'];
						$receiver=$row['receiver_name'];
									echo '<tr>
    	
    									<td>'.$order_id.'</td>
    									<td>'.$product_name.'</td>
    									<td>'.$qty.'</td>
    									<td>'.$size.'</td>
    									<td>'.$receiver.'</td>

    									<td>

 													<button type="button" class="btn btn-dark"><a class="text-light" href="receive.php?receiveid='.$id.'" >Action</a>
             	  
  													</button>
                  
    									</td>

   									 </tr>';





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
    $('#tebol001').DataTable({

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