<?php
    include '../commons/session.php';
    
    ///  getting user module information
    
    $moduleArray= $_SESSION["user_module"];
    
    include '../model/customer_model.php';
    $customerObj= new customer();
  
    $customer_id=$_GET["customer_id"];
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
                    <img src="../images/iconset/venusOutfits1.png" width="125px" height="125px" />
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
                    <h4 align="center">  Add Customer</h4>
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
                                        include_once '../includes/customer-navigation.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <form action="../controller/customer_controller.php?status=add_customer" enctype="multipart/form-data" method="post">
                    
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
                            <div class="col-md-9">&nbsp;</div>
                            <div class="col-md-3">
                                <a href="edit-customer.php?customer_id=<?php echo base64_encode($customer_id); ?>" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                                    Edit
                                </a>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>    
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >First Name :</label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><?php echo $cusrow["customer_fname"]?></label>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Last Name :</label>
                        </div>
                        <div class="col-md-4">
                             <label class="control-label"><?php echo $cusrow["customer_lname"]?></label>
                        </div>
                    </div>
                       <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>
                       <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >Address :</label>
                        </div>
                        <div class="col-md-10">
                             <label class="control-label"><?php echo $cusrow["customer_address"]?></label>
                        </div>   
                       </div>
                      <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >Email :</label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><?php echo $cusrow["customer_email"]?></label>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >NIC :</label>
                        </div>
                        <div class="col-md-4">
                             <label class="control-label"><?php echo $cusrow["customer_nic"]?></label>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>     
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >Land No :</label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><?php echo $cusrow["customer_cno1"]?></label>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Mobile No :</label>
                        </div>
                        <div class="col-md-4">
                             <label class="control-label"><?php echo $cusrow["customer_cno2"]?></label>
                        </div>
                    </div>
                     <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>    
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >country :</label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><?php echo $cusrow["customer_country"]?></label>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >City :</label>
                        </div>
                        <div class="col-md-4">
                             <label class="control-label"><?php echo $cusrow["customer_city"]?></label>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                    </div>    
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >State :</label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><?php echo $cusrow["customer_state"]?></label>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Postal code :</label>
                        </div>
                        <div class="col-md-4">
                             <label class="control-label"><?php echo $cusrow["customer_postalcode"]?></label>
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
    <script src="../js/uservalidation.js"></script>
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
                                .width(70)
                                .height(80)
                    };
                    
                    reader.readAsDataURL(input.files[0])
                    
                    
                }
                
                
            }
    
    
    </script>
</html>

