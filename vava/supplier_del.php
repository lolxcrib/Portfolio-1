<?php
include 'database/db.php';
   if(isset($_GET['deleteid'])){

      $id=$_GET['deleteid'];

      $sql="DELETE FROM `supplier` WHERE supplier_id=$id";
      $res=mysqli_query($conn,$sql);
      if($res){
        echo "DELETED!!";
        //sessionn
        header("location: supplier.php");
        
      }else{
        die(mysqli_error($conn));
      }
    }



?>