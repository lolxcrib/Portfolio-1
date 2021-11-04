<?php
include 'database/db.php';
include 'try.php';
$fname=$_SESSION['lastname/firstname/midname'];
//session_start();
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
	<title>Supplier</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<form action="" method="POST" class="needs-validation" novalidate>
<div class="container">




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




	<h1 class="text-center">Supplier Informations</h1>



	<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#sup">
    Add supplier
  </button>

  <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#category">
  Add Category
</button>

</div>


<table class="table table-bordered" id="tebol5">
  <thead class="table-dark">
    <tr>
      <th>Supplier Name</th>
      <th>Email</th>
      <th>Category</th>
      <th>Details</th>
      <th>Gender</th>
      <th>Address</th>
      <th>Action</th>
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
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$category.'</td>
                <td>'.$details.'</td>
                <td>'.$gender.'</td>
                <td>'.$address.'</td>

              <td>
              <button class="btn btn-secondary"><a class="text-light" href="supplier_update.php?updateid='.$id.'">Update</a></button>
                  <button class="btn btn-danger"><a class="text-light" href="supplier_del.php?deleteid='.$id.'">Delete</a></button>

                </td>


              </tr>


        ';

      }


    }



    ?>
  
  </tbody>
</table>




</div>

</form>

<?php
if(isset($_POST['categ'])){

  $category=$_POST['category'];

$sql= "insert into category(categ_name) values('$category')";
  $result = mysqli_query($conn, $sql);
  if($result){
    //echo "Inserted Succesfully";

   // $_SESSION['insert'] = "INSERTED SUCESSFULLY!!!";
  //  header("Location: supplier.php");

  }else{

    //echo "Woops! Something Wrong Went";

  }

}


?>

<form action="" method="POST">
  
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
            <button type="Submit" class="btn btn-dark" name="categ">Submit</button>
          </div>
        </div>
      </div>
    </div>




<!-- End MOdal -->

</form>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
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