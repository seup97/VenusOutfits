<?php
    include '../commons/session.php';
    
    ///  getting user module information
    
    $moduleArray= $_SESSION["user_module"];
    
    include '../model/category_model.php';
    include '../model/brand_model.php';
    include '../model/product_model.php';
    $categoryObj = new Category();
    $brandObj = new Brand();
    $productObj = new Product();
    $unitResult = $productObj->getAllUnits();
    $sizeResult = $productObj->getAllSizes();
    
    $productResult=$productObj->getAllProducts();
    $categoryResult=$categoryObj->getAllCategories();
    $brandResult=$brandObj->getAllBrands();
    
    include '../model/customer_model.php';
    $customerObj = new customer();
    //   getting all customers
    $customerResult = $customerObj->getAllCustomers();

?>
<html>
    <head>
        <!--  include bootstrap css   -->
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
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
                <div class="col-md-1">
                    <button class="btn btn-primary" onclick="history.go(-1);" style="font-weight: bold"> Back </button>
                </div>
                <div class="col-md-7">
                    <h4 align="center">  Add Order</h4>
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
                         <li><a href="dashboard.php">Dashboard</a></li>
                         <li><a href="order.php">Order Management</a></li>
                        <li>Add Order</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?php
                                        include_once '../includes/order_includes.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <form action="../controller/product_controller.php?status=add_product" enctype="multipart/form-data" method="post">
                    
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3" id="alertdiv">&nbsp;</div>
                    </div> 
                    <?php
                        if(isset($_GET["msg"]))
                        {
                            $msg=  base64_decode($_GET["msg"]);
                        ?>   
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="alert alert-danger">
                                    <?php 
                                        echo $msg;
                                    ?>
                                </div>    
                            </div>
                        </div> 
                        <?php    
                        }

                    ?>
                  <div class="row">
                        <h3 class="col-md-12">Order Details</h3>
                  </div>
                  <div class="form-group">
                  <label for="date" class="col-sm-12 control-label">Date: <?php echo date('Y-m-d') ?></label>
                </div> 
                 <div class="form-group">
                  <label for="time" class="col-sm-12 control-label">Date: <?php echo date('h:i:a') ?></label>
                </div>        
                  <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                   </div>      
                  <div class="col-md-8">
                  <div class="row">
                      <div class="col-md-3">
                         <label class="control-label">Customer Name</label>
                        </div>
                     <div class="col-md-4"> 
                     <div class="form-group">
                         <select class="form-control" id="customer_id" name="customer_id">
                                <option value="">--Select Customer--</option>
                              <?php
                                while($customer_row=$customerResult->fetch_assoc())
                                {
                              ?>
                                <option value="<?php echo $customer_row["customer_id"]; ?>">
                                <?php echo ($customer_row["customer_fname"]." ".$customer_row["customer_lname"]); ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select> 
                       </div>
                     </div>    
                  </div>
                   <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                   </div>    
                  <div class="row">
                       <div class="col-md-3">
                         <label class="control-label">Customer Address</label>
                        </div>
                      <div class="col-md-4" id ="showaddress"> 
                      
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                   </div>      
                <div class="row">
                       <div class="col-md-3">
                         <label class="control-label">Customer Phone</label>
                        </div>
                      <div class="col-md-4" id ="showphone"> 
                      
                        </div>
                </div>      
                </div>      
                    <div class="row">
                        <div class="col-md-12">
                         <table class="table table-bordered" id="product_info_table">
                      <thead>
                       <tr>
                      <th style="width:50%">Product</th>
                      <th style="width:10%">Qty</th>
                      <th style="width:10%">Rate</th>
                      <th style="width:20%">Amount</th>
                      <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
                      </tr>
                      </thead>
                         <tbody>
                     <tr id="row_1">
                       <td>
                        <select class="form-control" id="product_id"  name="product_id">
                                <option value="">--Select Product--</option>
                              <?php
                                while($product_row=$productResult->fetch_assoc())
                                {
                              ?>
                                <option value="<?php echo $customer_row["product_id"]; ?>">
                                <?php echo $product_row["product_name"]; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select> 
                        </td>
                        <td><input type="text" name="qty[]" id="qty_1" class="form-control" required onkeyup="getTotal(1)"></td>
                        <td>
                          <input type="text" name="rate[]" id="rate_1" class="form-control" autocomplete="off">
                          <input type="hidden" name="rate_value[]" id="rate_value_1" class="form-control" autocomplete="off">
                        </td>
                        <td>
                          <input type="text" name="amount[]" id="amount_1" class="form-control" disabled autocomplete="off">
                          <input type="hidden" name="amount_value[]" id="amount_value_1" class="form-control" autocomplete="off">
                        </td>
                        <td><button type="button" class="btn btn-default" onclick="removeRow('1')"><i class="fa fa-close"></i></button></td>
                     </tr>
                   </tbody>
                         </table>
                  </div>
                  </div>
                          <br /> <br/>

            <div class="col-md-6 col-xs-12 pull pull-right">

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-5 control-label">Gross Amount</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="gross_amount" name="gross_amount" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="gross_amount_value" name="gross_amount_value" autocomplete="off">
                    </div>
                  </div>
                 <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                   </div>
                  <div class="form-group">
                    <label for="vat_charge" class="col-sm-5 control-label">Delivery Charge</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="delivery_charge" name="delivery_charge" autocomplete="off">
                      <input type="hidden" class="form-control" id="vat_charge_value" name="vat_charge_value" autocomplete="off">
                    </div>
                  </div>
                 <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                   </div>
                  <div class="form-group">
                    <label for="discount" class="col-sm-5 control-label">Discount</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount" onkeyup="subAmount()" autocomplete="off">
                    </div>
                  </div>
                 <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                   </div>
                  <div class="form-group">
                    <label for="net_amount" class="col-sm-5 control-label">Net Amount</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="net_amount" name="net_amount" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="net_amount_value" name="net_amount_value" autocomplete="off">
                    </div>
                  </div>
                 <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                   </div>
                  <br /> <br/>
                 </form> 
            </div>
        </div>    
</div>

       
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

  </body>
    <!--   include jquery -->
    <script src="../js/jquery-1.12.4.js"></script>

    <script src="../js/ordervalidation.js"></script>
    <!-- include bootstrap js -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

        
</html>
