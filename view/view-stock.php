<?php
    include '../commons/session.php';
    
    ///  getting product module information
    include '../model/product_model.php';
    include '../model/stock_model.php';
    $productObj= new Product();
    $stockObj = new Stock();
    //   getting all users
    $productResult = $productObj->getAllProducts();

    
    $moduleArray= $_SESSION["user_module"];
?>
<html>
    <head>
        <!--  include bootstrap css   -->
                <!--  include bootstrap css   -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!--   include jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- include bootstrap js -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
           <script>
         
         loadStock = function(productid)
         {
           
            var url="../controller/product_controller.php?status=load_stock_modal";
     
            $.post(url,{product_id:productid},function(data){
         
                $("#stockcont").html(data);

             });
             
         }
        
       
   </script>  
     <style>
            body {
   font-family: "Arial", sans-serif;
 }

 .sidenav {
   height: 100%;
   width: 0;
   position: fixed;
   z-index: 1;
   top: 0;
   left: 0;
   background-color: #111;
   overflow-x: hidden;
   transition: 0.5s;
   padding-top: 60px;
 }

 .sidenav a {
   padding: 8px 8px 8px 32px;
   text-decoration: none;
   font-size: 20px;
   color: #818181;
   display: block;
   transition: 0.3s;
 }

 .sidenav a:hover {
   color: #f1f1f1;
 }

 .sidenav .closebtn {
   position: absolute;
   top: 0;
   right: 25px;
   font-size: 36px;
   margin-left: 50px;
 }


 @media screen and (max-height: 450px) {
   .sidenav {padding-top: 15px;}
   .sidenav a {font-size: 18px;}
 }
 .zoom {

  transition: transform .3s; /* Animation */;
}

.zoom:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
 </style>
</head>
<body>  
         <div class="sidenav" id="mySidenav">
           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#"><i class='fa fa-line-home'></i>&nbsp; Home</a>
            <a href="../view/dashboard.php"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a>
            <a href="../view/user.php"><i class="fa fa-user"></i>&nbsp; Users</a>
            <a href="../view/supplier.php"><i class="fa fa-handshake-o"></i>&nbsp;Suppliers</a>
            <a href="../view/customer.php"><i class="fa fa-user-plus"></i>&nbsp;Customers</a>
            <a href="../view/product.php"><i class="fa fa-list-alt"></i></span>&nbsp;Product</a>
            <a href="../view/delivery.php"><i class="fa fa-truck"></i>&nbsp; Delivery</a>
            <a href="../view/order.php"><i class='fa fa-send'></i>&nbsp; Orders</a>
            <a href="../view/store.php"><i class='fa fa-line-chart'></i>&nbsp; Stock</a>
            <a href="#"><i class='fa fa-line-arrow'></i>&nbsp; Logout</a>
       </div>
            <script>
                function openNav() {
                  document.getElementById("mySidenav").style.width = "200px";
                  document.getElementById("main").style.marginLeft = "200px";
                }

                function closeNav() {
                  document.getElementById("mySidenav").style.width = "0";
                  document.getElementById("main").style.marginLeft= "0";
                }
        </script>
              <div class="col-md-2">
                   <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
              </div> 
             <div class="container-fluid" style="max-width: 90%">       
            <div class="row">
                <div class="col-md-1">
                    <img src="../images/iconset/venusOutfits1.png" width="100px" height="100px" alt="Avatar"/>
                </div>
                <div class="col-md-8">
                    <h1 align="center">Clothing Store Management System</h1>
                </div>
            </div>
           <hr class="solid" style="border-top: 3px solid #bbb;"/>
            <div class="row">
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-user"></span>
                    &nbsp;
                    <?php
                       echo ucwords($_SESSION["user"]["user_fname"]." ".$_SESSION["user"]["user_lname"]) ;
                    ?>
                </div>
                <div class="col-md-8">
                    <h4 align="center">  View Products</h4>
                </div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-bell"></span>
                    &nbsp;
                    <button class="btn btn-primary">Logout</button>
                </div>
            </div>
            <hr class="solid" style="border-top: 3px solid #bbb;"/>
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?php
                                        include_once '../includes/store-navigation.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="generated_stock_report.php" class="btn btn-success">
                                <span class="glyphicon glyphicon-book"></span> &nbsp;
                                Generate Stock Report
                            </a>
                        </div>    
                        <div class="col-md-4">    
                            <a href="generated_stock_report.php?status=save" class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-save"></span> &nbsp;
                                Save Stock Report
                            </a>
                        </div> 
                        <div class="col-md-4">    
                            <a href="../controller/product_controller.php?status=send_email" class="btn btn-success">
                                <span class="glyphicon glyphicon-envelope"></span> &nbsp;
                                Send As Email
                            </a>
                        </div>    
                  
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <table class="table table-striped" id="usertable">
                        <thead>
                            <tr style="background-color: #1796bd;color: #FFF">
                                <th>#</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Updated date</th>
                                <th>Available Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                                while($product_row=$productResult->fetch_assoc())
                                {
                                    $product_id= $product_row["product_id"];
                                    
                                $tot_qty=  $stockObj->getProductStock($product_id);
                                
                                    
                            ?>
                            <tr>
                                 
                                <td><?php echo $i++; ?></td>
                                <td><?php echo ucwords($product_row["product_name"]); ?></td>
                                <td><?php echo ucwords($product_row["brand_name"]);  ?></td>
                                <td><?php echo ucwords($product_row["cat_name"]);  ?></td>
                                <td>#</td>
                                <td>
                                    <?php echo $tot_qty;  ?>  <?php echo $product_row["unit_name"];   ?>
                                </td>
                            </tr>
                            <?php
                                }
                            
                            ?>
                            
                        </tbody>
                        
                    </table>
               
                </div>
                
            </div>
        </div>
           <div class="modal fade" id="modalStock" role="dialog">
    
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                      <form action="../controller/product_controller.php?status=add_stock" method="post">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button> 
                      <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"></span>&nbsp; Add Stock  </h4>
                    </div>
                    <div class="modal-body">
                        <div id="stockcont">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" >
                            <span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Save
                        </button>

                      &nbsp;
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </form>
                  </div>

                </div>
            </div>
    </body>
    <!--   include jquery -->

</html>

