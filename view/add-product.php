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
    
    $categoryResult=$categoryObj->getAllCategories();
    $brandResult=$brandObj->getAllBrands();
    
    
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
                    <img src="../images/iconset/venusOutfits1.png" width="100px" height="100px"/>
                </div>
                <div class="col-md-8">
                    <h1 align="center">Clothing Store Management System</h1>
                </div>
                <div class="col-md-2">&nbsp;</div>
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
                    <h4 align="center">  Add Product</h4>
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
                         <li><a href="product.php">Product Management</a></li>
                        <li>Add Product</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?php
                                        include_once '../includes/main-product-navigation.php';
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
                        <div class="col-md-2">
                            <label class="control-label" >Product Name</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="prname" id="prname" class="form-control"/>
                        </div>  
                    </div>
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>    
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >Description</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="prdescription" style="height:100px" id="prdescription" class="form-control"/>
                        </div>
                    </div>        
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label"> Category</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                            <select class="form-control" id="cat_id" name="cat_id">
                                <option value="">--Select Category--</option>
                              <?php
                                while($cat_row=$categoryResult->fetch_assoc())
                                {
                              ?>
                                <option value="<?php echo $cat_row["cat_id"]; ?>">
                                <?php echo $cat_row["cat_name"]; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>  
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label"> Brands</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" >
                                <select class="form-control" id="brand_id" name="brand_id" >
                                    <option value="">--Select Brand--</option>
                                  <?php
                                while($brand_row=$brandResult->fetch_assoc())
                                {
                              ?>
                                <option value="<?php echo $brand_row["brand_id"]; ?>">
                                <?php echo $brand_row["brand_name"]; ?>
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
                            <div class="col-md-2">
                            <label class="control-label">Unit</label>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                            <select class="form-control" id="unit_id" name="unit_id">
                                <option value="">--Select unit--</option>
                                <?php
                                while($unit_row=$unitResult->fetch_assoc())
                                {
                                ?>
                                <option value="<?php echo $unit_row["unit_id"]; ?>">
                                <?php echo $unit_row["unit_name"];  ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Price</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Rs</span>
                                <input type="text" class="form-control" name="price" id="price"/>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                              <label class="control-label" >Barcode Number</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="barcode" id="barcode" class="form-control" required="required"/>
                             <span id="displayvalidate"></span>
                        </div>
                        <div class="col-md-2">
                             <button type="button" class="btn btn-success" id="generatebtn">
                                 <span class="glyphicon glyphicon-refresh"></span>&nbsp;Generate
                             </button>
                         </div>
                         <div class="col-md-2">
                            <label class="control-label">Product Image</label>
                        </div>
                        <div class="col-md-2">
                            <input type="file" class="form-control" name="product_image" onchange="readImage(this);"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>    
                    <div class="row">
                        <div class="col-md-3">&nbsp;</div>
                         <div class="col-md-3" id="diplaybarcode"> 
                             
                         </div>
                        <div class="col-md-3">&nbsp;</div>
                        <div class="col-md-3">
                            <img id="imgprev"/>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2">
                            <input type="submit" class="btn btn-success" value="Save"/>&nbsp;
                            <input type="reset" class="btn btn-danger" value="Reset"/>
                        </div>
                    </div>
                      </form>    
                    </div>
                </div>
           
        </div>
    </body>
    <!--   include jquery -->
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/productvalidation.js"></script>
    <!-- include bootstrap js -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
    <script>
            function readImage(input)
            {
                ///  check if I have selected a file
                if(input.files  && input.files[0])
                {
                    var reader = new FileReader();
                    reader.onload= function(e)
                    {
                        $("#imgprev")
                                .attr('src',e.target.result)
                                .width(120)
                                .height(80)
                    };
                    
                    reader.readAsDataURL(input.files[0])
                    
                    
                }
                
                
            }
    
    
    </script>
</html>