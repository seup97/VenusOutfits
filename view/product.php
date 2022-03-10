<?php
    include '../commons/session.php';
    
    ///  getting user module information
    
    $moduleArray= $_SESSION["user_module"];
    
    include '../model/user_model.php';
    $userObj = new User();
    
    $activeResult= $userObj->getActiveUserCount();
    
    $activerow=$activeResult->fetch_assoc();
    
    ///  deactivated user count
    $deactiveResult= $userObj->getDeactiveUser();
    $deactiveCount=$deactiveResult->num_rows;
    
      include '../model/brand_model.php';
     $brandObj= new Brand();
     
     $brandCountResult= $brandObj->getBandCount();
    
    $brandCount=$brandCountResult->num_rows;
    
      include '../model/category_model.php';
    $categoryObj = new Category();
    
     $catCountResult= $categoryObj->getCategoryCount();
    
    $categoryCount=$catCountResult->num_rows;
    
    include '../model/product_model.php';
     $productObj= new Product();
    
     $productCountResult= $productObj->getProductCount();
    
    $productCount=$productCountResult->num_rows;
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
                    <img src="../images/iconset/venusOutfits1.png" alt="Venus Outfit Logo" width="100px" height="100px"/>
                </div>
                <div class="col-md-8">
                    <h1 align="center">Clothing Store Management System</h1>
                </div>
                <div class="col-md-2">&nbsp;</div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-user"></span>
                    &nbsp;
                    <?php
                       echo ucwords($_SESSION["user"]["user_fname"]." ".$_SESSION["user"]["user_lname"]) ;
                    ?>
                </div>
                <div class="col-md-8">
                    <h4 align="center">  Product Management</h4>
                </div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-bell"></span>
                    &nbsp;
                    <button class="btn btn-primary">Logout</button>
                </div>
            </div>
            <hr/>
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
                                        include_once '../includes/main-product-navigation.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <div class="col-md-6">
                        <div class="panel panel-default" style="background-color:#ebc334;color: #FFF;height:250px ">
                            <h2 align="center">Products Expiring in the <br/> Next 7 Days</h2>
                            <h1 align="center">
                                <?php
                                    echo $activerow["activeUserCount"];
                                ?>
                            </h1>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="panel panel-default" style="background-color:#eb8f34;color: #FFF;height:250px ">
                            <h2 align="center">Category Count</h2>
                            <h1 align="center">
                                <?php
                                    echo $categoryCount;
                                ?>
                            </h1>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="panel panel-default" style="background-color:#eb8f34;color: #FFF;height:250px ">
                            <h2 align="center">Brand Count</h2>
                            <h1 align="center">
                                <?php
                                    echo $brandCount ;
                                ?>
                            </h1>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="panel panel-default" style="background-color:#eb8f34;color: #FFF;height:250px ">
                            <h2 align="center">Product Count</h2>
                            <h1 align="center">
                                <?php
                                    echo $productCount;
                                ?>
                            </h1>
                        </div>
                    </div>
               
                </div>
                
            </div>
        </div>
    </body>
    <!--   include jquery -->
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/loginvalidation.js"></script>
    <!-- include bootstrap js -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>