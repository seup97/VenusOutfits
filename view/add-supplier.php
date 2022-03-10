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
                           <input id="companyName" name="companyName" rows="4" cols="113" class="form-control"/>
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
                            <label class="control-label" >Address 1</label>
                        </div>
                        <div class="col-md-4">
                            <textarea type="text" name="address1" id="address1" rows="3"  class="form-control"></textarea>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Address 2</label>
                        </div>
                        <div class="col-md-4">
                            <textarea type="text" name="address2" id="address2" rows="3" class="form-control"></textarea>
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
                              <label class="control-label" >City</label>
                        </div>
                        <div class="col-md-4">
                             <input type="text" name="city" id="city" class="form-control"/>
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


