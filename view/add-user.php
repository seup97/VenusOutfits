<?php
    include '../commons/session.php';
    
    ///  getting user module information
    
    $moduleArray= $_SESSION["user_module"];
    
    include_once '../model/user_model.php';
    $userObj = new User();
    $roleResult=$userObj->getUserRoles();
    
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
                    <h4 align="center">  Add User</h4>
                </div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-bell"></span>
                    &nbsp;
                    <button class="btn btn-primary" style="font-weight: bold" >Logout</button>
                </div>
            </div>
             <hr class="solid" style="border-top: 3px solid #bbb;"/>
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="user.php">User Management</a></li>
                        <li>Add User</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?php
                                        include_once '../includes/user-navigation.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <form action="../controller/user_controller.php?status=add_user" enctype="multipart/form-data" method="post">
                    
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
                              <label class="control-label" >Gender</label>
                        </div>
                        <div class="col-md-4">
                            Male &nbsp;<input type="radio" name="gender" value="0" checked="checked"/>
                            Female &nbsp;<input type="radio" name="gender" value="1"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" >Contact Land</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="cno1" id="cno1" class="form-control"/>
                        </div>
                        <div class="col-md-2">
                              <label class="control-label" >Contact Mobile</label>
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
                            <label class="control-label" >User Role</label>
                        </div>
                         
                        <div class="col-md-4">
                            <select class="form-control" id="user_role" name="user_role" required="required">
                                <option value="">Select user role</option>
                                <?php
                                    while($role_row=$roleResult->fetch_assoc())
                                    {
                                  ?>
                                     <option value="<?php echo $role_row["role_id"] ?>"><?php echo $role_row["role_name"] ?></option>
                                <?php
                                        
                                    }
                                ?>
                            </select>
                        </div>
                        
                         
                         <div class="col-md-2">
                              <label class="control-label" >User Image</label>
                        </div>
                        <div class="col-md-4">
                            <input type="file" name="user_img" id="user_image" class="form-control" onchange="readImage(this);"/>
                             <br/>
                             <img id="imgprev" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="cont">
                            
                            
                        </div>
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