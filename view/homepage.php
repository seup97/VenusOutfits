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
                    &nbsp;
                </div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-bell"></span>
                    &nbsp;
                    <button class="btn btn-primary">Logout</button>
                </div>
            </div>
            <hr class="border-dark">
            <div class="row">
                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                          <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-truck-loading"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Total Suppliers</span>
                            <span class="info-box-number">
                              <?php 
                                #$supplier = $conn->query("SELECT * FROM supplier_list")->num_rows;
                                #echo number_format($supplier);
                              ?>
                              <?php ?>
                            </span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-boxes"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Total Items</span>
                            <span class="info-box-number">
                             <?php 
                                # $item = $conn->query("SELECT * FROM item_list where `status` =0 ")->num_rows;
                               #  echo number_format($item);
                              ?>
                            </span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                       <!-- /.col -->
                       <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file-invoice"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Approve P.O.</span>
                            <span class="info-box-number">
                              <?php 
                                # $po_appoved = $conn->query("SELECT * FROM po_list where `status` =1 ")->num_rows;
                                # echo number_format($po_appoved);
                              ?>
                            </span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                      <!-- /.col -->
                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-invoice"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Denied PO</span>
                            <span class="info-box-number">
                              <?php 
                                # $po = $conn->query("SELECT * FROM po_list where `status` =2 ")->num_rows;
                                # echo number_format($po);
                              ?>
                            </span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                    </div>
            <div class="container">

            </div>
