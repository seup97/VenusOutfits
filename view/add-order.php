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
    </head>
    <body>
        <div class="container-fluid" style="max-width: 90%">
            <div class="row">
                <div class="col-md-2">
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
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>     
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >Order Number</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="ordernumber" id="ordernumber" class="form-control"/>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label" >Customer Name</label>
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
                        <div class="col-md-2">
                            <label class="control-label" >Product Name</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
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
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label" >Sizes</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" id="size_id"  name="size_id">
                                <option value="">--Select Size--</option>
                              <?php
                                while($size_row=$sizeResult->fetch_assoc())
                                {
                              ?>
                                <option value="<?php echo $size_row["product_id"]; ?>">
                                <?php echo $size_row["size_name"]; ?>
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
                            <label class="control-label" >Quantity</label>
                        </div>
                        <div class="col-md-4">
                             <input type="number" id="quantity" name="quantity" min="1" max="1000">
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
                            <div class="col-md-12">Shipping Details</div>
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
    $(function()
    {
      $(".multiple").select2();
    });
    </script>
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
