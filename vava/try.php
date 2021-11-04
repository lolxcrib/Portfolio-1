
<?php
include 'database/functions.php';
session_start();

$fname=$_SESSION['lastname/firstname/midname'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Access</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">


  <style type="text/css">
    #navbarSupportedContent{font-size: 30;}

    #navbarSupportedContent ul li a:hover{background-color: #5A8FF7;color: white;transition: 0.6s;border-radius: 8px;}
    #navbarSupportedContent ul li:hover >ul {display: block;top:40px;}
    
  </style>
</head>
<body style="background-color: #D0D6E3">

<nav class="navbar navbar-expand-md navbar-light" style="background: #2060EC; border: 2px black solid;box-shadow: 0 10px 15px #737579">
  <div class="container-fluid" style="font-weight: bold;">
    <a class="navbar-brand" href="try.php">

      <?php echo "" . $_SESSION['lastname/firstname/midname'] . ""; ?>


    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right: 50px; font-weight: bold;">
        <li class="nav-item ms-5">
          <a class="nav-link active" aria-current="page" href="">Home</a>
        </li>
        <div class="d-flex">
        <li class="nav-item ">
          <a class="nav-link" href="users.php">Manage Access</a>
        </li>
      </div>

       <div class="d-flex">
        <li class="nav-item ">
          <a class="nav-link" href="sales.php">Sales report</a>
        </li>
      </div>



       <li class="nav-item dropdown d-flex">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Accounting
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="payable.php">Account Payables</a></li>
           
            <li><a class="dropdown-item" href="#">Account Receivables </a></li>
          </ul>
        </li>


   <li class="nav-item dropdown d-flex">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Purchase Order
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="ordtable.php">Order list</a></li>
           
            <li><a class="dropdown-item" href="po.php">Purchase order </a></li>
            <li><a class="dropdown-item" href="supplier.php">Suppliers Information</a></li>
          </ul>
        </li>



           <li class="nav-item dropdown d-flex">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Supplies
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="stocks.php">Stocks</a></li>
           
            <li><a class="dropdown-item" href="category.php">Category</a></li>
            <li><a class="dropdown-item" href="stock-release.php">Stock Release</a></li>
            <li><a class="dropdown-item" href="stock-receive.php">Stock Receive</a></li>
          </ul>
        </li>




<ul class="navbar-nav mr-auto">
         <li class="nav-item dropdown ">
            <a class="nav-link" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications 
                <?php
                $query = "SELECT * from `notifications` where `status` = 'unread' order by `date` DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
                    ?>
              </a>

           <div class="dropdown-menu" aria-labelledby="dropdown01">

                <?php
                $query = "SELECT * from `notifications` order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="view.php?id=<?php echo $i['id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php 
                  
                if($i['type']=='adduser'){
                    echo ucfirst($i['name'])."<br> added a new user.";
                    //header("location:users.php");
                }if($i['type']=='stocklimit'){
                    echo ucfirst($i['name'])." ";
                    echo "<br>";
                    echo "has ran out of ";
                    echo ucfirst($i['message'])." ";
                    echo "please check!!";
                }if($i['type']=='stockrelease'){
                    echo ucfirst($i['name'])." ";
                    echo "<br>";
                    echo "is releasing ";
                    echo ucfirst($i['message'])." ";
                    echo "quantity of ";
                     echo "<br>";
                    echo ucfirst($i['qty'])." ";
                   // header("location: stock-release.php");
                }if($i['type']=='addstock'){
                    echo ucfirst($i['name'])." is adding a new";
                    echo "<br>";
                    echo "Stock: ";
                    echo ucfirst($i['message'])." ";
                    echo "<br>";
                    echo "Quantity: ";
              
                    echo ucfirst($i['qty'])." ";
                   // header("location: stock-release.php");
                }if($i['type']=='addcategory'){
                    echo ucfirst($i['name'])."<br> is adding a new";
                    echo "<br>";
                    echo "Category: ";
                    echo ucfirst($i['message'])." ";
                   
                   // header("location: stock-release.php");
                }if($i['type']=='stockrelease_delete'){
                    echo ucfirst($i['name'])."<br> is removing a list from stock release";
                    echo "<br>";
                    echo "Product Name: ";
                    echo ucfirst($i['message'])." ";
                   
                   // header("location: stock-release.php");
                }if($i['type']=='stockreceive_delete'){
                    echo ucfirst($i['name'])."<br> is removing a list from stock receive";
                    echo "<br>";
                    echo "Product Name: ";
                    echo ucfirst($i['message'])." ";
                   
                   // header("location: stock-release.php");
                }if($i['type']=='addsupp'){
                    echo ucfirst($i['name'])."<br> is adding a new supplier";
                    echo "<br>";
                    echo "Supplier: ";
                    echo ucfirst($i['message'])." ";
                   
                   // header("location: stock-release.php");
                }
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                     ?>


                   
         
  </li>
        



  </ul>

  
        




    
                <li class="nav-item ms-5">
          <a class="nav-link active" aria-current="page" href="index.php" style="margin-left: 0"><span><img src="images/power-icon.png" width="30px" height="30px"></span>Logout</a>
        </li>

      </ul>

    </div>
  </div>
</nav>




<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>