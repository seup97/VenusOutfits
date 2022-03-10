<?php
    include '../commons/session.php';
    
    ///  getting user module information
    
    $moduleArray= $_SESSION["user_module"];
    
    include '../model/customer_model.php';
    $customerObj= new customer();
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
                    <h4 align="center">  Add Customer</h4>
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
                        <div class="col-md-2">
                            <label class="control-label" >First Name</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="fname" id="fname" class="form-control"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Last Name</label>
                        </div>
                        <div class="col-md-4">
                             <input type="text" name="lname" id="lname" class="form-control"/>
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
                           <textarea id="address" name="address" rows="4" cols="113" class="form-control"></textarea>
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
                            <input type="text" name="email" id="email" class="form-control"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >NIC</label>
                        </div>
                        <div class="col-md-4">
                             <input type="text" name="nic" id="nic" class="form-control"/>
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
                        <div class="col-md-2">
                            <label class="control-label" >country</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="country" id="country" class="form-control"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >City</label>
                        </div>
                        <div class="col-md-4">
                             <input type="text" name="city" id="city" class="form-control"/>
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
                            <input type="text" name="state" id="state" class="form-control"/>
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

