<?php include 'database/db.php'; ?>
<?php
$id=$_GET['updateid'];

$sql="SELECT
                  account_payable.id,
                  category_payable.id AS categ_id,
                  category_payable.categ_name,
                  account_payable.categ_id,
                  account_payable.payable_name,
                  account_payable.bill,
                  account_payable.date,
                  account_payable.due_date,
                  account_payable.description
                  FROM
                  account_payable
                  INNER JOIN category_payable ON account_payable.categ_id = category_payable.id
                   WHERE account_payable.id=$id";

            $result=mysqli_query($conn,$sql);
            if($result->num_rows>0){
              while($row = $result->fetch_assoc()){
                $categ_id=$row['categ_id'];
               
                $categ_name=$row['categ_name'];
                $payable_name=$row['payable_name'];
                $bill=$row['bill'];
                $date=$row['date'];
                $due_date=$row['due_date'];
                $description=$row['description'];





              }

            }
            
            
         $sql1="SELECT * FROM `category_payable`";
         $runs=mysqli_query($conn,$sql1);   

?>
<?php

  if(isset($_POST['submit'])){

    $category=$_POST['category'];
    $payable_name=$_POST['name'];
    $bill=$_POST['bill'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $details=$_POST['details'];

    $update="UPDATE `account_payable` SET `id`=$id,`categ_id`=$category,`payable_name`='$payable_name',`bill`='$bill',`date`='$from',`due_date`='$to',`description`='$details' WHERE id=$id";

    $run=mysqli_query($conn,$update);
    if($run){
      header("Location:payable.php");
      echo "SUCCESSFULL!!";
    }else{

      die(mysqli_error($conn));
    }


  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">

<h1 class="text-center my-4">Update Payable</h1>

<form class="row g-4" action="" method="POST">

  <div class="col-md-4">
    <label  class="form-label">Category</label>
      <select class="form-select" name="category">
          
           <option value="<?php echo$categ_id; ?>"> <?php echo$categ_name; ?></option>
           <?php

           while($rows=mysqli_fetch_array($runs)){
            ?>

            <option value="<?php echo$rows['id']; ?>"><?php echo$rows['categ_name']; ?></option>
            <?php
           }


           ?>


        </select>

  </div>

  <div class="col-md-5">
    <label class="form-label">Payable name</label><br>
    <input type="text" class="form-control" id="inputPassword4" name="name" value="<?php echo $payable_name; ?>"  >
  </div>



  <div class="col-md-2">
    <label class="form-label">Bill</label>
      <input type="number" name="bill" class="form-control" value="<?php echo$bill; ?>">
  </div>

  <div class="col-md-4">
    <label  class="form-label">Date Issued</label><br>
    <input type="date" class="form-control" id="inputPassword4" name="from" value="<?php echo$date; ?>" >
  </div>



  <div class="col-md-4">
    <label  class="form-label">Due date</label><br>
    <input type="date" class="form-control" id="inputPassword4" name="to" value="<?php echo$due_date; ?>" >
  </div>


  
  <div class="col-md-4">
    <label  class="form-label">More details</label><br>
     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="details" value="<?php echo $description; ?>"><?php echo $description; ?></textarea>
  </div>






  <div class="col-12">
    <button type="submit" class="btn btn-dark" name="submit">Update</button>
    <button type="submit" class="btn btn-danger" name="cancel" >Cancel</button>
  </div>

<?php

if(isset($_POST['cancel'])){

  header('location: payable.php');
}



?>

</div>


</form> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
