<?php include'database/db.php'; 

session_start();
?>

<?php
$pr = "SELECT * FROM `category`";	
$run = mysqli_query($conn, $pr);

if(isset($_POST['submit'])){

$category = $_POST['category'];
$product_id= $_POST['product_id'];
$name = $_POST['name'];
$qty = $_POST['qty'];
$size = $_POST['size'];
$description = $_POST['description'];
$price = $_POST['price'];

$sql= "INSERT INTO `stock`( `product_id`, `category_id`, `product_name`, `qty`, `sizing`, `description`, `prc`) VALUES ('$product_id','$category','$name','$qty','$size','$description','$price')";

$rs=mysqli_query($conn,$sql);
if($rs){

	$_SESSION['insert'] = "SUCCESSFULLY SAVE";
	///Session
}else{

	die(mysqli_error($conn));


}
}
	


?>
<?php

 if(isset($_GET['deleteid'])){

          $id=$_GET['deleteid'];

          $sql="DELETE FROM `stock` WHERE id=$id";
          $rs=mysqli_query($conn,$sql);

          if($rs){
            
            $_SESSION['delete'] = "DELETED SUCCESSFULLY";

            header("Location:stocks.php");
            
          }else{

            //echo "DATA IS STORED IN THIS PRODUCT";
            //die(mysqli_error($conn));
            $_SESSION['warn'] = "DELETED!! SOME DATA STORED IS THIS PRODUCT";
            header("Location:stocks.php");
        
          }


        }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Stocks</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>
<body>
<div class="container"> 

<form method="POST" action="" class="needs-validation" novalidate>






<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Stocks</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        	

      	

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category</label>
    <select class="form-select" name="category" required>
    	<option></option>
    	<?php
    	while($rows = mysqli_fetch_array($run)){
    	?>

    	<option value="<?php echo $rows['categ_id']; ?>"><?php echo $rows['categ_name']; ?></option>
    	<?php
    	}
    	?>

    </select>
    <div class="invalid-feedback">
        Please select category
      </div>
    
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product ID</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="product_id" required>
     <div class="invalid-feedback">
        Please input your ID
      </div>
  </div>

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="name" required>
     <div class="invalid-feedback">
        Please input your product name
      </div>
  </div>
 
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="qty" required>
     <div class="invalid-feedback">
        Please input your qty
      </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Sizing</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="size" required>
     <div class="invalid-feedback">
        Please input the size.
      </div>
  </div>

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea class="form-control" name="description" required></textarea>
     <div class="invalid-feedback">
        Please input your description
      </div>
  </div>

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Price</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="price" required>
     <div class="invalid-feedback">
        Please input your price
      </div>
  </div>


  <script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

	
</script>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </div>
  </div>
</div>






<h1 class="text-center my-4">Manage Supplies</h1>


<?php
      if(isset($_SESSION['insert'])){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>DATA</strong> <?php echo $_SESSION['insert']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        <?php
        
        unset($_SESSION['insert']);
      }



      ?>
      <?php
      if(isset($_SESSION['delete'])){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>DATA</strong> <?php echo $_SESSION['delete']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        <?php
        
        unset($_SESSION['delete']);
      }



      ?>

      <?php
      if(isset($_SESSION['warn'])){
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>CANNOT BE</strong> <?php echo $_SESSION['warn']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        <?php
        
        unset($_SESSION['warn']);
      }



      ?>

<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add product
</button>


<button type="button" class="btn btn-dark my-4" data-bs-toggle="modal" data-bs-target="#category">
  Add Category
</button>

</form>

<?php
if(isset($_POST['save'])){
  $category = $_POST['category'];

  $sql= "insert into category(categ_name) values('$category')";
  $result = mysqli_query($conn, $sql);
  if($result){
    //echo "Inserted Succesfully";

    $_SESSION['insert'] = "INSERTED SUCESSFULLY!!!";
   // header("Location:stocks.php");

  }else{

    //echo "Woops! Something Wrong Went";

  }
}else{

  //echo "Woops! Data Already EXist";
 // $_SESSION['lmt'] = "ALREADY EXIST!!!";

}


?>



<form action=""  method="POST">
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
            <button type="Submit" class="btn btn-dark" name="save">Submit</button>
          </div>
        </div>
      </div>
    </div>




<!-- End MOdal -->


</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>




<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

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
//responsive: true
        search: "_INPUT_",
        searchPlaceholder: "Search Product",
      }

    });
     responsive: true
} );

</script>






<table class="table" id="tebol">
  <thead class="table-dark">
    <tr>  
      <th>Product ID</th>
    	<th>Product Name</th>
    	<th>Qty</th>
    	<th>Sizing</th>
      <th>Price</th>
    	<th>Description</th>
      <th>Action</th>

    </tr>
  </thead>
  <tbody>
	<?php

	$sql="SELECT * FROM `stock`";
  $result = $conn->query($sql);

  if($result->num_rows>0){
    while ($row=$result->fetch_assoc()){
      $id=$row['id'];
      $pname=$row['product_name'];
      $qty=$row['qty'];
      $size=$row['sizing'];
      $description=$row['description'];
      $price=$row['prc'];
     echo '<tr>
     <td>'.$id.'</td>
      <td>'.$pname.'</td>
       <td>'.$qty.'</td>
       <td>'.$size.'</td>
       <td>'.$price.'</td>
        <td>'.$description.'</td>

        <td>
      <button class="btn btn-dark"><a class="text-light" href="stock_update.php?updateid='.$id.'">Update</a></button>
      <button class="btn btn-secondary editbtn">Release</button>
    
      </td>

      </tr>';
      if ($qty<100){
      echo "Warning the following stocks are low: <br>";
      echo "Product Name: $pname  <br>";
      echo "Please check the availability";
    }



    }

  }else{

    die(mysqli_error($conn));
  }

 
        
 
	?>
  </tbody>

</table>



<form action="" method="POST">

<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Releasing</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        
    <input type="hidden" name="update_id" id="update_id">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Product Name:</label>
          <input type="text" class="form-control" id="pname" aria-describedby="emailHelp" name="name" value="<?php echo $id;?>"  readonly required> 

        
        </div>


        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Qty:</label>
          <input type="text" class="form-control" id="qty" aria-describedby="emailHelp" name="qtey" readonly  required> 

        </div>




        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Sizing:</label>
          <input type="text" class="form-control" id="size" aria-describedby="emailHelp" name="sizing" readonly required> 

        </div>

         <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Price:</label>
          <input type="text" class="form-control" id="price" aria-describedby="emailHelp" name="prc" readonly required> 

        </div>


        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Qty release:</label>
          <input type="number" class="form-control"  aria-describedby="emailHelp" name="reles"  required> 

        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="release">Release item</button>

      </div>
    </div>
  </div>
</div>




</form>

<?php



if(isset($_POST['release'])){

  $product=$_POST['update_id'];
  $reles=$_POST['reles'];
  $qtey=$_POST['qtey'];
  $prc=$_POST['prc'];
  if($reles>$qtey){

  echo "YOUR RELEASE IS GREATER THAN STOCK AVAILABILITY!!!";
    
  }if($reles<$qtey){

    $total=$qtey-$reles;
    $sales=$reles*$prc;

     //insert sa sales

      $sale="INSERT INTO `sales`(`product_id`,`sale`) VALUES ('$product','$sales')";
      $run=mysqli_query($conn,$sale);

      if($run){

        $rilis="INSERT INTO `stock_release`(`stock_id`, `qty`) VALUES ('$product','$reles')";
        $rs=mysqli_query($conn,$rilis);
        if($rs){

          $prod="UPDATE `stock` SET `id`=$product,`qty`=$total where id=$product";
          $rss=mysqli_query($conn,$prod);
          if($rss){

            echo "Remaning stocks: $total"; //update sa stocks
            header("Location: stocks.php");


          }


        }

      }






   

    



    
  }if($reles==$qtey){

    echo "SAMME";
  }

   

    
  


}



?>

</div>

<script>
  $(document).ready(function(){

    $('.editbtn').on('click',function(){
      $('#editmodal').modal('show');

      $tr =$(this).closest('tr');

      var data= $tr.children("td").map(function(){

        return $(this).text();
      }).get();


      console.log(data);

     $('#update_id').val(data[0]);
      $('#pname').val(data[1]);
      $('#qty').val(data[2]);
      $('#size').val(data[3]);
      $('#price').val(data[4]);



    });
  });





</script>


</body>
</html>