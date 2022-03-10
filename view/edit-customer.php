<?php
    include '../commons/session.php';
    
    ///  getting user module information
    
    $moduleArray= $_SESSION["user_module"];
    
    include_once '../model/user_model.php';
    $userObj = new User();

    
    $user_id=$_REQUEST["user_id"];
    $user_id=  base64_decode($user_id);
    $userResult=$userObj->getSpecificUser($user_id);
    
    $userrrow=$userResult->fetch_assoc();
    
     include '../model/customer_model.php';
    $customerObj= new customer();
  
    $customer_id=$_REQUEST["customer_id"];
    $customer_id=  base64_decode($customer_id);
    $customerResult= $customerObj->getSpecificCustomer($customer_id);
    
    $cusrow= $customerResult->fetch_assoc();///   will converted the record into an associative array
    
 
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
                    <button class="btn btn-primary" onclick="history.go(-1);" style="font-weight: bold "> Back </button>
                </div>
                <div class="col-md-7">
                    <h4 align="center">  Edit Customer</h4>
                </div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-bell"></span>
                    &nbsp;
                    <button class="btn btn-primary" style="font-weight: bold ">Logout</button>
                </div>
            </div>
            <hr class="solid" style="border-top: 3px solid #bbb;"/>
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                       <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="user.php">User Management</a></li>
                        <li><a href="view-users.php">View Users</a></li>
                        <li>Edit User</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?php
                                        include_once '../includes/customer-navigation.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <form action="../controller/customer_controller.php?status=update_customer" enctype="multipart/form-data" method="post">
                    
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
                            <div class="col-md-12">&nbsp;</div>
                    </div>    
                        <input type="hidden" name="user_id" value="<?php echo $customer_id; ?>"/>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >First Name</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $cusrow["customer_fname"];  ?>"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Last Name</label>
                        </div>
                        <div class="col-md-4">
                             <input type="text" name="lname" id="lname" value="<?php echo $cusrow["customer_lname"];  ?>" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label">Address</label>
                        </div>
                        <div class="col-md-10">
                           <textarea id="address" name="address" rows="4" cols="113" value="<?php echo $cusrow["customer_address"];  ?>" class="form-control"></textarea>
                        </div>   
                    </div>
                   <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>     
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >Email</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $cusrow["customer_email"];  ?>"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >NIC</label>
                        </div>
                        <div class="col-md-4">
                             <input type="text" name="nic" id="nic" class="form-control" value="<?php echo $cusrow["customer_nic"];  ?>"/>
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
                            <input type="text" name="cno1" id="cno1" class="form-control" value="<?php echo $cusrow["customer_cno1"];  ?>"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Mobile No</label>
                        </div>
                        <div class="col-md-4">
                             <input type="text" name="cno2" id="cno2" class="form-control" value="<?php echo $cusrow["customer_cno2"];  ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >Country</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="country" id="country" class="form-control" value="<?php echo $cusrow["customer_country"];  ?>"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >City</label>
                        </div>
                        <div class="col-md-4">
                             <input type="text" name="city" id="city" class="form-control" value="<?php echo $cusrow["customer_city"];  ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                     <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >State</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="state" id="state" class="form-control" value="<?php echo $cusrow["customer_state"];  ?>"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Postal Code</label>
                        </div>
                        <div class="col-md-4">
                             <input type="text" name="postalcode" id="postalcode" class="form-control" value="<?php echo $cusrow["customer_postalcode"];  ?>"/>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-12" id="cont">
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
    <script src="../js/customervalidation.js"></script>
    <!-- include bootstrap js -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
</html>
