<?php
    include '../commons/session.php';
    
    ///  getting user module information
    
    $moduleArray= $_SESSION["user_module"];
      
    include '../model/supplier_model.php';
    $supplierObj= new supplier();
    $supplierResult = $supplierObj->getAllSuppliers();
    
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
                    <img src="../images/iconset/venusOutfits1.png" width="125px" height="125px" />
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
                <div class="col-md-8">
                    <h4 align="center">  Add Supplier</h4>
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
                                        include_once '../includes/supplier-navigation.php';
                    ?>
                </div>   
                <div class="col-md-9">
                    <form action="../controller/supplier_controller.php?status=add_supplier" enctype="multipart/form-data" method="post">
                    
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
                        <h4 style="font-weight: bold; color: gray">Company Details</h4>
                    </div>
                     <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>    
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label">Company Name</label>
                        </div>
                        <div class="col-md-4">
                           <input type="text"  id="companyName" name="companyName" class="form-control"/>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label" >Company Email</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="email" id="email" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>    
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >Address Line 1</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="doorno" id="doorno" placeholder="Door Number"  class="form-control"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Address Line 2</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="street" id="street" placeholder="Street" class="form-control"/>
                        </div>
                    </div>
                      <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                             <div class="col-md-2">
                            <label class="control-label" >Address Line 3</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="city" id="city" placeholder="City"  class="form-control"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Postal code</label>
                       </div>
                       <div class="col-md-4">
                             <input type="text" name="postalcode" id="postalcode" class="form-control"/>
                       </div> 
                    </div>
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >country</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="country" id="country" class="form-control"/>
                        </div>
                         <div class="col-md-2">
                            <label class="control-label" >State</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="state" id="state" class="form-control"/>
                        </div> 
                    </div>
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>    
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >Land No</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="cno1" id="cno1" class="form-control"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Mobile No</label>
                        </div>
                        <div class="col-md-4">
                             <input type="text" name="cno2" id="cno2" class="form-control"/>
                        </div>
                    </div>   
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>    
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>    
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label">Industry</label>
                        </div>
                        <div class="col-md-4">
                           <input id="industry" name="industry" rows="4" cols="113" class="form-control"/>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label" >Product/Services Description</label>
                        </div>
                        <div class="col-md-4">
                            <textarea type="text" name="psdescription" id="psdescription" rows="2" class="form-control"></textarea>
                        </div>
                    </div>    
                     <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>
                     <div class="row">
                        <h4 style="font-weight: bold; color: gray">Main Contact Details</h4>
                    </div>
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div> 
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label">Contact Name</label>
                        </div> 
                        <div class="col-md-4">
                           <input id="contactName" name="contactName" rows="4" cols="113" class="form-control"/>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label" >Contact Email</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="contactemail" id="contactemail" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>    
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label">Company Position</label>
                        </div> 
                        <div class="col-md-4">
                           <input id="companyPosition" name="companyPosition"class="form-control"/>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label" >Phone Number</label>
                        </div>
                        <div class="col-md-4">
                            <input type="contactno" name="contactno" id="email" class="form-control"/>
                        </div>
                    </div>
                     <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>
                     <div class="row">
                        <h4 style="font-weight: bold; color: gray">Additional Information</h4>
                    </div>
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>     
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label">Comments</label>
                        </div> 
                        <div class="col-md-10">
                            <textarea id="comments" name="comments" rows="4"class="form-control"></textarea>
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
    <!-- include bootstrap js -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/suppliervalidation.js">
    
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
                                .width(70)
                                .height(80)
                    };
                    
                    reader.readAsDataURL(input.files[0])
                    
                    
                }
                
                
            }
    
    
    </script>
</html>


