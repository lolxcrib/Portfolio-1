<?php
include 'try.php';
include 'database/db.php';
$fname=$_SESSION['lastname/firstname/midname'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Stock Receive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>
<body>
<div class="container">

<form action="" method="POST">
<!-- Modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
       <label class="form-label">Product ID</label>
        <input type="text" id="id" class="form-control" readonly>

        <label class="form-label">Category</label>
        <input type="text" id="categ_name" class="form-control" readonly>

        <label class="form-label">Product Name</label>
        <input type="text" id="name" class="form-control" readonly>

        <label class="form-label">Quantity</label>
        <input type="text" id="qty" class="form-control" readonly>
        
        <label class="form-label">Sizing</label>
        <input type="text" id="size" class="form-control" readonly>

          <label class="form-label">Receiver</label>
        <input type="text" id="receiver" class="form-control" readonly>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>



        
      </div>
    </div>
  </div>
</div>
</form>


<form action="" method="POST">
<!-- Modal -->
<div class="modal fade" id="deltbn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      
        <input type="hidden" name="del" id="id">
        <input type="hidden" name="name" id="names">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" name="delt">Yes</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php

if(isset($_POST['delt'])){

  $del=$_POST['del'];
  $name=$_POST['name'];
 

  $sql="DELETE FROM `stock_receive` WHERE receive_id=$del";


  $runs=mysqli_query($conn,$sql);

  if($runs){

   // header("location: stock_receive.php");

   $sql="INSERT INTO `notifications`(`name`, `type`, `message`, `status`, `date`) VALUES ('$fname','stockreceive_delete','$name','unread',CURRENT_TIMESTAMP)";

    $result=mysqli_query($conn,$sql);
  }
  


}

?>
  
<h1 class="text-center my-3">Stock Receive</h1>

<table class="table table-bordered" id="tevol21">
  <thead class="table-dark">
    <tr>
        <th style="display: none;">ID</th>
        <th style="display: none;">Product ID</th>
        <th>Product Name</th>
        <th style="display: none;">Category</th>
        <th style="display: none;">Receiver Name</th>
        <th>Qty received</th>
        <th>Sizing</th>
        <th>Action</th>


    </tr>
  </thead>
  <tbody>
    <?php
    include 'database/db.php';

    $sql="SELECT
                stock_receive.receive_id,
                stock_receive.receiver_name_id,
                stock_receive.category_id,
                stock_receive.product_id,
                stock_receive.product_name,
                stock_receive.qty as qtey,
                stock_receive.sizing,
                purchase_record_order.id,
                purchase_record_order.supplier_id,
                purchase_record_order.product_name,
                purchase_record_order.qty,
                purchase_record_order.size,
                purchase_record_order.location,
                purchase_record_order.receiver_name,
                purchase_record_order.order_id,
                category.categ_id,
                category.categ_name
                FROM
                stock_receive
                INNER JOIN purchase_record_order ON stock_receive.receiver_name_id = purchase_record_order.id
                INNER JOIN category ON stock_receive.category_id = category.categ_id";

                $result=mysqli_query($conn,$sql);
                if($result->num_rows>0){
                  while($row=$result->fetch_assoc()){
                    $id=$row['receive_id'];
                    $product_name=$row['product_name'];
                    $qty=$row['qtey'];
                    $size=$row['sizing'];
                    $categ_name=$row['categ_name'];
                    $receiver_name=$row['receiver_name'];
                    $product_id=$row['product_id'];


                    echo '


                        <tr>
                          <td style="display: none;">'.$id.'</td>
                          <td style="display: none;">'.$product_id.'</td>
                          <td>'.$product_name.'</td>
                          <td style="display: none;">'.$categ_name.'</td>
                           <td style="display: none;">'.$receiver_name.'</td>
                          <td>'.$qty.'</td>
                          <td>'.$size.'</td>

                          <td>

                            <button class="btn btn-dark viewbtn">View</button>
                            <button class="btn btn-danger deletebtn">Delete </button>


                          </td>
                        </tr>





                    ';





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
  $(document).ready(function(){

    $('.viewbtn').on('click',function(){
      $('#viewmodal').modal('show');

      $tr =$(this).closest('tr');

      var data= $tr.children("td").map(function(){

        return $(this).text();
      }).get();


      console.log(data);

       $('#id').val(data[1]); 
       $('#categ_name').val(data[3]);
       $('#name').val(data[2]);
       $('#qty').val(data[5]);
       $('#size').val(data[6]);
       $('#receiver').val(data[4]);

     
  
    



    });
  });





</script>

<script>
  $(document).ready(function(){

    $('.deletebtn').on('click',function(){
      $('#deltbn').modal('show');

      $tr =$(this).closest('tr');

      var data= $tr.children("td").map(function(){

        return $(this).text();
      }).get();


      console.log(data);

       $('#id').val(data[0]); 

       $('#names').val(data[1]); 
        


     
  
    



    });
  });





</script>

<script>
  
  $(document).ready(function() {
    $('#tevol21').DataTable({

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