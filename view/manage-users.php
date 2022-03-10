             <?php
    include '../commons/session.php';
    
    ///  getting user module information
    include '../model/user_model.php';
    $userObj = new User();
    //   getting all users
    
    $userResult = $userObj->getAllUsers();
    
    
    $moduleArray= $_SESSION["user_module"];
?>
<html>
    <head>
        <style>
        </style>
            
        <!--  include bootstrap css   -->
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
    </head>
    <body>
        <div class="container-fluid" style="max-width: 90%">
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
                 <div class="col-md-1">&nbsp;</div>
                <div class="col-md-1">
                    <img src="../images/iconset/venusOutfits1.png" width="80px" height="80px"/>
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
                    <h4 align="center">  View Users</h4>
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
                        <li>Manage Users</li>
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
                    <table class="table table-striped" id="usertable">
                        <thead>
                            <tr style="background-color: #1796bd;color: #FFF">
                                <th>&nbsp;</th>
                                <th>Name</th>
                                <th>NIC</th>
                                <th>User Role</th>
                                <th>Satus</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($user_row=$userResult->fetch_assoc())
                                {
                                    $user_id=  base64_encode($user_row["user_id"]);
                                    
                                    if($user_row["user_image"]=="")
                                    {
                                        $userImage="defaultImage.jpg";
                                    }
                                    else
                                    {
                                        $userImage=$user_row["user_image"];
                                    }
                                    
                            ?>
                            <tr>
                                <td>
                                    <img src="../images/user_images/<?php echo $userImage ?> " width="60" height="80px" />
                                </td>
                                <td><?php echo ucwords($user_row["user_fname"]." ".$user_row["user_lname"]);    ?></td>
                                <td><?php echo $user_row["user_nic"];  ?></td>
                                <td><?php echo $user_row["role_name"];  ?></td>
                                <td>
                                    <?php
                                        if($user_row["user_status"]==1)
                                        {
                                     ?>   
                                    <label class="label label-success">Active</label>
                                     <?php       
                                        }
                                        else
                                        {
                                     ?>   
                                      <label class="label label-danger">Deactive</label>
                                     <?php       
                                        }
                                    ?>
                                    
                                </td>
                                <td>
                                    <a href="view-user.php?user_id=<?php echo $user_id; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span>&nbsp;View</a>
                                    
                                    <?php 
                                        if($user_row["user_status"]==1)
                                        {
                                           ?>
                                    <a href="../controller/user_controller.php?status=deactivate&user_id=<?php echo $user_id ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp; Deactivate</a> 
                                           <?php
                                        }
                                        else
                                        {
                                            ?>
                                    <a href="../controller/user_controller.php?status=activate&user_id=<?php echo $user_id ?>" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>&nbsp; Activate</a> 
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                  <a href="edit-user.php?user_id=<?php echo $user_id; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>  
                                  <a href="../controller/user_controller.php?status=delete_user&user_id=<?php echo $user_id ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;Delete</a>
                                </td>
                            </tr>
                            <?php
                                }
                            
                            ?>
                            
                        </tbody>
                        
                    </table>
               
                </div>
                
            </div>
        </div>
    </body>
    <!--   include jquery -->
    <script src="../js/datatable/jquery-3.5.1.js"></script>
    <script src="../js/datatable/jquery.dataTables.min.js"></script>
    <!-- include bootstrap js -->
    <script src="../js/datatable/dataTables.bootstrap.min.js"></script>
    <script>
            $(document).ready(function(){
                $("#usertable").DataTable();
            });
    </script>
</html>