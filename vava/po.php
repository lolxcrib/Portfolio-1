<?php
include 'database/db.php';
//include 'dashboard.php';
include 'try.php';
//session_start();
$fname=$_SESSION['lastname/firstname/midname'];
$sql="SELECT * FROM `category`";
$run=mysqli_query($conn,$sql);

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $email=$_POST['email'];
  $category=$_POST['category'];
  $details=$_POST['detail'];
  $gender=$_POST['gender'];
  $address=$_POST['address'];

  $sql="INSERT INTO `supplier`( `lastname/firstname/midname`, `email`, `category_id`, `details`, `gender`, `address`) VALUES ('$name','$email','$category','$details','$gender','$address')";

  $run=mysqli_query($conn,$sql);

  if($run){
    $_SESSION['insert'] = "SUCCESSFULLY INSERTED";


    //session
 $sql="INSERT INTO `notifications`(`name`, `type`, `message`, `status`, `date`) VALUES ('$fname','addsupp','$name','unread',CURRENT_TIMESTAMP)";

    $rs=mysqli_query($conn,$sql);


    
  }else{
    die(mysqli_error($conn));
  }

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Purchase Order</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

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



<form action="" method="POST" class="needs-validation" novalidate>
<div class="container">




<div class="my-4">

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
      if(isset($_SESSION['ourder'])){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>DATA</strong> <?php echo $_SESSION['ourder']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        <?php
        //header("Location:po.php");
        unset($_SESSION['ourder']);
      }



      ?>






	<h1 class="text-center" style="font-family: Bodoni MT Black; color: #0049FF;text-shadow: 10px 10px 20px black; font-size: 100px;"> Purchase Order</h1>

</div>
<div class="my-4">
<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#sup">
  Add Supplier
</button>

<button type="submit" class="btn btn-dark" name="view"><a class="text-light" href="ordtable.php">View Orders</a>
  
</button>


</div>



<!-- Modal -->
<div class="modal fade" id="sup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add supplier details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        



  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Full Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required>
    <div id="emailHelp" class="form-text">Last name/Middle name/ First name</div>
    <div class="invalid-feedback">
      Please input your fullname.
    </div>
  </div>


    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email:</label>
    <input type="email" class="form-control" id="exampleInputPassword1" name="email" required>
    <div class="invalid-feedback">
      Please input your email @.
    </div>
  </div>



  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Category:</label>
      
      <select class="form-select" name="category">
        
      <option></option>
        <?php
        while($rows=mysqli_fetch_array($run)){

          ?>
          <option value="<?php echo$rows['categ_id'] ?>"> <?php echo$rows['categ_name']; ?> </option>
          <?php
        }


        ?>


      </select>



    <div class="invalid-feedback">
      Please input your category.
    </div>
  </div>
 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">More details:</label>
    <textarea class="form-control" name="detail" required></textarea>

    <div class="invalid-feedback">
      Please input your details.
    </div>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Gender:</label>
    <select class="form-select" name="gender" required>
      <option></option>
      <option>Male</option>
      <option>Female</option>
    </select>

    <div class="invalid-feedback">
      Please select your gender.
    </div>
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Address:</label>
    <input type="text" class="form-control" name="address" required>
    <div class="form-text">House/Building/Street Number, Street Name. Barangay/District Name, City/Municipality.</div>

    <div class="invalid-feedback">
      Please input your complete address.
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
        <button type="submit" class="btn btn-dark" name="submit">Save</button>
      </div>
    </div>
  </div>
</div>
<?php


if(isset($_POST['urder'])){


  $id=$_POST['update_id'];
  $product_name=$_POST['pname'];
  $qty=$_POST['qty'];
  $size=$_POST['size'];
  $location=$_POST['drop'];
  $orderid=$_POST['orderid'];


  $sql="INSERT INTO `purchase_record_order`(`supplier_id`, `product_name`, `qty`, `size`, `location`, `receiver_name`, `order_id`) VALUES ('$id','$product_name','$qty','$size','$location','$fname','$orderid')";

  $run=mysqli_query($conn,$sql);
  if($run){
    //header('location:po.php');
    $_SESSION['ourder'] = "SUCCESSFULLY SAVE!!";
  }else{
    die(mysqli_error($conn));
  }



}


?>




</form>



<form action="" method="POST" class="needs-validations">

<!-- order -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          <input type="hidden" name="update_id" id="update_id">

            <label class="form-label">Supplier name</label>
            <input class="form-control" name="supplier" id="sname" readonly  required>

            <label class="form-label">Category</label>
            <input class="form-control" name="category" id="cat" readonly required>

             <label class="form-label">Order ID</label>
            <input class="form-control" name="orderid" required>

            <label class="form-label">Product Name</label>
            <input class="form-control" name="pname" required>


             <label class="form-label">Qty</label>
            <input type="number" class="form-control" name="qty" required>

             <label class="form-label">Size</label>
            <input class="form-control" name="size" required>

             <label class="form-label">Drop off location</label>
            <input class="form-control" name="drop" required>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-dark" name="urder">Confirm order</button>
      </div>
    </div>
  </div>
</div>



</form>



<script>
  
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validations')

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




<table class="table table-bordered" id="tebol5">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Supplier Name</th>
      <th>Category</th>
      <th>Address</th>
      <th>Operation</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $disp="SELECT
                  supplier.`lastname/firstname/midname`,
                  supplier.email,
                  category.categ_name,
                  supplier.details,
                  supplier.gender,
                  supplier.address,
                  supplier.supplier_id
                  FROM
                  supplier
                  INNER JOIN category ON supplier.category_id = category.categ_id";

    $result=mysqli_query($conn,$disp);

    if($result->num_rows>0){

      while($row =$result->fetch_assoc()){
        $id=$row['supplier_id'];
        $name=$row['lastname/firstname/midname'];
        $email=$row['email'];
        $category=$row['categ_name'];
        $details=$row['details'];
        $gender=$row['gender'];
        $address=$row['address'];
        echo '


            <tr>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$category.'</td>
                <td>'.$address.'</td>

              <td>
             	<button  class="btn btn-dark editbtn">Order</button>
                  

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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

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
      $('#sname').val(data[1]);
      $('#cat').val(data[2]);



    });
  });





</script>





<script>

  
  $(document).ready(function() {
    $('#tebol5').DataTable({

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