<!---<h1>Notifications</h1>-->

<?php
    ob_start();
    include 'try.php';
    //include("database/functions.php");

    $id = $_GET['id'];

    $query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $id;";
    performQuery($query);


   //header("location: try.php");

     $query = "SELECT * from `notifications` where `id` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['type']=='stockrelease'){
              // echo ucfirst($i['name'])." release a stock an amount of ".$i['qty'];
           ?>
           <div class="form-control">
                <?php
                echo "User: ";
                echo ucfirst($i['name'])."<br> Release: ".$i['qty']."<br> Product name: ".$i['message'];

                ?>


           </div>
           <a href="stocks.php">Back</a>
           <?php
            	//header("location:stock-release.php");
            }if($i['type']=='stocklimit'){
                
                echo "Out of stock<br> Product name: ".$i['message']."<br>";

                ?>
                <a href="stocks.php">click here to see the details</a>
                <?php

            	
            }if($i['type']=='adduser'){
               echo ucfirst($i['name'])." adding ".$i['message']." as a new user";


                ?>
                <br>
                <a href="users.php">click here to see details</a>
                <?php
               
            }if($i['type']=='addstock'){

              echo ucfirst($i['name'])." adding ".$i['message']." as a new stock <br>";
              ?>
              <a href="stocks.php">click here to  see details</a>
              <?php

            }if($i['type']=='addcategory'){
              echo ucfirst($i['name'])." adding ".$i['message']." as a new category <br>";


              ?>
              <a href="category.php">See details</a>
              <?php


            }if($i['type']=='stockrelease_delete'){

              ?>
              <br>
              <br>
              <a href="stock-release.php">Back</a>
              <?php
            }if($i['type']=='stockreceive_delete'){

              ?>
              <a href="stock-receive.php">Back</a>
              <?php

            }if($i['type']=='addsupp'){
              echo ucfirst($i['name'])." adding ".$i['message']." as a new supplier <br>";

                header("location:supplier.php");
             
            }
        }
    }

    

?><br/>



