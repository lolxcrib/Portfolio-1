<?php
session_start();

?>
<?php
$fname=$_SESSION['lastname/firstname/midname'];

  
include 'database/db.php';

$sql="SELECT * FROM `users` WHERE `lastname/firstname/midname`='$fname'";
$run=mysqli_query($conn,$sql);
if($run){
  if(mysqli_num_rows($run)>0){
    while($rows=mysqli_fetch_array($run)){
         $username=$rows['username'];
          $email=$rows['email'];
          $address=$rows['address'];
     

    }

  }


}
?>


<?php

   if(isset($_POST['save'])){

            $name=$_POST['name'];
            $mail=$_POST['mail'];
            $address=$_POST['address'];
            

            
            $update="UPDATE `users` SET `email`='$mail',username='$name',`address`='$address' WHERE `lastname/firstname/midname`='$fname'";
          $rs=mysqli_query($conn,$update);
          if($rs){
            echo "Updated";
          //  header("location:dashboard.php");
          }else{
            die(mysqli_error($conn));
          }




        }


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>

<div class="container">
	<div class="my-5">
  <?php echo "<h1>Welcome " . $_SESSION['lastname/firstname/midname'] . "</h1>"; ?>
  </div>
<form action="" method="POST">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profile">
  Update Profile
</button>

<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo$username; ?>" name="name">
    
  </div>


  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputPassword1" value="<?php echo$email; ?>" name="mail">
  </div>


 
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Address</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo$address; ?>" name="address">
  </div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="save">Update</button>
      </div>
    </div>
  </div>
</div>







<a href="login.php">Logout</a>


</form>
</div>
</body>
</html>


