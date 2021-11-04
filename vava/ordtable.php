<?php include 'database/db.php';
	include 'try.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Orders</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style type="text/css">
  			.table{

  				border: 2px black solid; box-shadow: 5px 5px 8px grey;
  			}
  			.table tr{transition: all .2s ease-in;cursor: pointer;}
  			.table tbody tr:nth-child(even){background: #EDEDED;}
  			.table tbody tr{text-align: center;}
			.table tbody tr:hover{background-color: #969698;transform: translate(1.02);}

  		</style>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="viewbt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        
      <input type="hidden" name="inputid" id="update_id">


      <label class="form-label">Order ID</label>
      <input type="text" name="orderid" id="idd" class="form-control" readonly>

      <label class="form-label">Supplier</label>
      <input type="text" name="suplier" id="supplier" class="form-control" readonly>

      <label class="form-label">Category</label>
      <input type="text" name="category" id="category" class="form-control" readonly>


      <label class="form-label">Product Name</label>
      <input type="text" name="product_name" id="pname" class="form-control" readonly>

      <label class="form-label">Qty</label>
      <input type="text" name="qtey" id="qty" class="form-control" readonly>

      <label class="form-label">Size</label>
      <input type="text" name="sizing" id="size" class="form-control" readonly>

      <label class="form-label">More Details</label>
      <input type="text" name="details" id="info" class="form-control" readonly>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" name="submit">Cancel Order</button>
      </div>

      </form>


    </div>
  </div>
</div>


<?php
if(isset($_POST['confirm'])){
	$ayde=$_POST['ayde'];
	$ca_id=$_POST['ca_id'];
	$oid=$_POST['oid'];
	$product_name=$_POST['product_name'];
	$rqty=$_POST['rqty'];
	$sizze=$_POST['sizze'];
	$order_qty=$_POST['ordered_qty'];

	if($rqty<$order_qty){

		$sum=$order_qty-$rqty;
		echo "Insufficient value of order quantity: $sum  ";
	}else{

			$sql="INSERT INTO `stock_receive`( `receiver_name_id`, `category_id`, `product_id`, `product_name`, `qty`, `sizing`) VALUES ($ayde,$ca_id,'$oid','$product_name','$rqty','$sizze')";
		$run=mysqli_query($conn,$sql);
		if($run){

		


		}else{

			die(mysqli_error($conn));
		}

	}


//subra
	



	

}
?>
<form action="" method="POST">


<!-- Modal -->
<div class="modal fade" id="rcv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Receiving</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

       	<input type="hidden" name="ayde" id="dd">
       	<input type="hidden" name="ca_id" id="cat_id"><br>

       	<label class="form-label">Order ID</label>
       	<input type="text" name="oid" id="ord" class="form-control" readonly>

       	<label class="form-label">Product Name</label>
       	<input type="text" name="product_name" id="name" class="form-control" readonly>

       	 <label class="form-label">Ordered Qty</label>
       	<input type="text" name="ordered_qty" id="oqty" class="form-control" readonly>

       	<label class="form-label">Size</label>
       	<input type="text" name="sizze" id="siz" class="form-control" readonly>

       	<label class="form-label">Receiver</label>
       	<input type="text" name="received" id="recever" class="form-control" readonly>

       	 	<label class="form-label">Receive Qty</label>
       	<input type="number" name="rqty" class="form-control" >



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="confirm">Confirm</button>
      </div>
    </div>
  </div>
</div>

</form>





<div class="container">
	<h1 class="text-center" style="font-family: Bodoni MT Black; color: #0049FF;text-shadow: 10px 10px 20px black; font-size: 100px;"> Order List</h1>
<?php
if(isset($_POST['submit'])){

	$id=$_POST['inputid'];

	$sql="DELETE FROM `purchase_record_order` WHERE id=$id";
	$run=mysqli_query($conn,$sql);
	if($run){

		echo '<p style="color: #FF0000">SUCCESSFULLY!! CANCEL</p>';
		//header("Location: ordtable.php");


	}else{
		die(mysqli_error($conn));
	}

	
}


?>




<div class="container">
<div class="table-responsive">
<table class="table" id="tebol">
  <thead class="table-dark">
    <tr>
    	<th style="display: none;">#</th>
    	<th>Order ID</th>
    	<th style="display: none;">Suppliers Name</th>
    	<th style="display: none;">Category</th>
    	<th>Product Name</th>
    	
    	<th>Qty</th>
    	<th>Size</th>
    	<th style="display: none;">More Info</th>
    	<!--<th>Receiver Name</th>-->
    	<th style="display: none;">Category #</th>
    	<th style="display: none;">Receiver Name</th>
    	<th>Operation</th>
    	
  </thead>
  <tbody>
    <?php

	  			  $disp="SELECT
								purchase_record_order.id,
								purchase_record_order.order_id,
								purchase_record_order.supplier_id,
								purchase_record_order.product_name,
								purchase_record_order.qty,
								purchase_record_order.size,
								purchase_record_order.location,
								purchase_record_order.receiver_name as receiver,
								supplier.supplier_id,
								supplier.`lastname/firstname/midname`,
								supplier.email,
								supplier.category_id,
								supplier.details,
								supplier.gender,
								supplier.address,
								category.categ_id,
								category.categ_name
								FROM
								purchase_record_order
								INNER JOIN supplier ON purchase_record_order.supplier_id = supplier.supplier_id
								INNER JOIN category ON supplier.category_id = category.categ_id";

				$result=mysqli_query($conn,$disp);

				if($result->num_rows>0){
					while($row = $result-> fetch_assoc()){
						$id=$row['id'];
					
						$name=$row['lastname/firstname/midname'];
						$category=$row['categ_name'];
						$receiver=$row['receiver'];
						$product_name=$row['product_name'];
						$qty=$row['qty'];
						$size=$row['size'];
						$details=$row['details'];
						$order_id=$row['order_id'];
						$categ_id=$row['categ_id'];
						echo '

							<tr>
								<td style="display: none;">'.$id.'</td>
								<td>'.$order_id.'</td>
								<td style="display: none;">'.$name.'</td>
								<td style="display: none;">'.$category.'</td>
								<td>'.$product_name.'</td>
								<td>'.$qty.'</td>
								<td>'.$size.'</td>
								<td style="display: none;"	>'.$details.'</td>
								<td style="display: none;">'.$categ_id.'</td>
								<td style="display: none;">'.$receiver.'</td>
								
								


								<td>
									
									<button class="btn btn-secondary viewbtn">Action</button>
									<button class="btn btn-success receivebtn">Receiving</button>
									
									 
								</td>


							

							</tr>



						';



					}


				}else{

					die(mysqli_error($conn));
				}

		if(isset($_GET['deleteid'])){

	$id=$_GET['deleteid'];

	$sql="DELETE FROM `purchase_record_order` WHERE id=$id";
					$rs=mysqli_query($conn,$sql);

					if($rs){
						header('location:ordtable.php');
						
							echo "DELETED";
						
					}else{

						die(mysqli_error($conn));
					}


				}	




			


    ?>


  </tbody>
</table>
</div>
</div>

</div>


















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>


<script>
	$(document).ready(function(){

		$('.receivebtn').on('click',function(){
			$('#rcv').modal('show');


			$tr =$(this).closest('tr');

			var data= $tr.children("td").map(function(){

				return $(this).text();
			}).get();


			console.log(data);

			$('#dd').val(data[0]);
			$('#ord').val(data[1]);
			$('#cat_id').val(data[8]);
			$('#name').val(data[4]);
			$('#oqty').val(data[5]);
			$('#siz').val(data[6]);
			$('#recever').val(data[9]);





		});
	});





</script>




<script>
	$(document).ready(function(){

		$('.viewbtn').on('click',function(){
			$('#viewbt').modal('show');


			$tr =$(this).closest('tr');

			var data= $tr.children("td").map(function(){

				return $(this).text();
			}).get();


			console.log(data);

			$('#update_id').val(data[0]);
			$('#idd').val(data[1]);
			$('#supplier').val(data[2]);
			$('#category').val(data[3]);
			$('#pname').val(data[4]);
			$('#qty').val(data[5]);
			$('#size').val(data[6]);
			$('#info').val(data[7]);



		});
	});





</script>

<script>

	
	$(document).ready(function() {
    $('#tebol').DataTable({

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