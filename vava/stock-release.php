<?php
include 'try.php';
include 'database/db.php';

$fname=$_SESSION['lastname/firstname/midname'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock Release</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">


</head>
<body>
<div class="container">





	
<h1 class="text-center my-2"> Stock Release</h1>



<form action="" method="POST">
<!-- Modal -->
<div class="modal fade" id="vbtn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Stock release details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label class="form-label"> Product ID</label>
       <input type="text" id="id" class="form-control"  readonly> 

        <label class="form-label"> Product Name</label>
       <input type="text" id="name" class="form-control"  readonly> 
              <label class="form-label">Categroy</label>
       <input type="text" id="categ" class="form-control"  readonly> 

       <label class="form-label">Qty release</label>
       <input type="text" id="release" class="form-control"  readonly> 

       <label class="form-label">Sizing</label>
       <input type="text" id="sizing" class="form-control"  readonly> 






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" name="delt">Yes</button>
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
        <input type="hidden" name="del" id="idd">
        <input type="hidden" name="named" id="namess">
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
  $name=$_POST['named'];

  $sql="DELETE FROM `stock_release` WHERE release_id=$del";


  $runs=mysqli_query($conn,$sql);

  if($runs){

    $sql="INSERT INTO `notifications`(`name`, `type`, `message`, `status`, `date`) VALUES ('$fname','stockrelease_delete','$name','unread',CURRENT_TIMESTAMP)";

    $result=mysqli_query($conn,$sql);
  }
  


}


?>






<table class="table table-bordered" id="tevol22">
  <thead class="table-dark">
    <tr>
      <th style="display: none;" >ID</th>
    	<th>Product ID</th>
    	<th>Product Name</th>
    	<th>Qty release</th>
    	<th style="display: none;">Sizing</th>
      <th style="display: none;">Category</th>
    	<th>Action</th>
    </tr>
  </thead>
  <tbody>
    
  <?php
  include 'database/db.php';

  $sql="SELECT
stock.product_name,
stock.qty,
stock.sizing,
stock_release.release_id,
stock_release.stock_id,
stock_release.qty,
stock.id,
stock.product_id,
stock.category_id,
stock.description,
stock.prc,
category.categ_id,
category.categ_name
FROM
stock_release
INNER JOIN stock ON stock_release.stock_id = stock.id
INNER JOIN category ON stock.category_id = category.categ_id
";

              $result = mysqli_query($conn,$sql);

              if($result->num_rows>0){
                while($row=$result->fetch_assoc()){

                    $id=$row['release_id'];
                    $product_id=$row['product_id'];
                    $product_name=$row['product_name'];
                    $qty=$row['qty'];
                    $sizing=$row['sizing'];
                    $categ_name=$row['categ_name'];


                     echo '<tr>
                                 <td style="display: none;">'.$id.'</td> 
                                <td>'.$product_id.'</td>
                                 <td>'.$product_name.'</td>
                                 <td>'.$qty.'</td>
                                  <td style="display: none;">'.$sizing.'</td>
                                  <td style="display: none;">'.$categ_name.'</td>

                                  <td>
                                
                                <button class="btn btn-dark viewbtn">View</button>
                                 <button class="btn btn-danger deletebtn">Delete</button>
                              
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
  $(document).ready(function(){

    $('.viewbtn').on('click',function(){
      $('#vbtn').modal('show');

      $tr =$(this).closest('tr');

      var data= $tr.children("td").map(function(){

        return $(this).text();
      }).get();


      console.log(data);

      $('#id').val(data[1]); 
       $('#name').val(data[2]); 
     $('#release').val(data[3]);
      $('#sizing').val(data[4]);
      $('#categ').val(data[5]);
  
    



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

      $('#idd').val(data[0]); 
      $('#namess').val(data[2]);

  
    



    });
  });





</script>

<script>
  
  $(document).ready(function() {
    $('#tevol22').DataTable({

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