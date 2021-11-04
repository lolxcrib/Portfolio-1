<?php
include 'database/db.php';

if(isset($_POST['updatedata'])){

  $id= $_POST['update_id'];
  $name= $_POST['name']; 
  $address= $_POST['address'];
  $email= $_POST['email'];
  $gender= $_POST['gender'];
  
  $username= $_POST['username'];
  $password= $_POST['password'];

  $status= $_POST['stat'];




  $sql="UPDATE `users` SET `lastname/firstname/midname`='$name',`gender`='$gender',`address`='$address',`email`='$email',`username`='$username',`password`='$password',`stat_id`='$status' WHERE id='$id'";

  $query_run= mysqli_query($conn,$sql);

  if($query_run){

    echo "POOOOTA";
   header('location:users.php');
  }else{

    die(mysqli_error($conn));
  }

}

?>