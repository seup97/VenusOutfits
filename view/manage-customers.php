<?php
    include '../commons/session.php';
    
    ///  getting user module information
    include '../model/customer_model.php';
    $customerObj = new customer();
    //   getting all users
    
    $customerResult = $customerObj->getAllCustomers();
    
    
    $moduleArray= $_SESSION["user_module"];
?>
<html>
    <head>
        <!--  include bootstrap css   -->
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
        
    </head>
    <body>
        <div class="container-fluid" style="max-width: 90%">
            <div class="row">
                <div class="col-md-2">
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
                <div class="col-md-8">
                    <h4 align="center">  Manage Customers</h4>
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
                <div class="col-md-2">
                    <?php
                                        include_once '../includes/customer-navigation.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <table class="table table-striped" id="usertable">
                        <thead>
                            <tr style="background-color: #1796bd;color: #FFF">
                                <th>#</th>
                                <th>Date Created</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>NIC</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                while($customer_row=$customerResult->fetch_assoc())
                                {
                                    $customer_id=  base64_encode($customer_row["customer_id"]);
                                    
                            ?>
                            <tr>
                                <td align="center"><?php echo $i++; ?></td>
                                <td><?php echo date("Y-m-d H:i",strtotime($customer_row['date_created'])) ?></td>
                                <td><?php echo ucwords($customer_row["customer_fname"]." ".$customer_row["customer_lname"]);?></td>
                                <td><?php echo $customer_row["customer_address"]; ?></td>
                                <td><?php echo $customer_row["customer_nic"];  ?></td>
                                <td><?php echo $customer_row["customer_email"];  ?></td>
                                <td><?php echo $customer_row["customer_cno1"]." ".$customer_row["customer_cno2"];  ?></td>
                                <td><?php echo $customer_row["customer_city"];  ?></td>
                                <td>
                                    <?php
                                        if($customer_row["customer_status"]==1)
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
                                <td align="center">
                                    <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                      <li><a href="#">HTML</a></li>
                                      <li><a href="#">CSS</a></li>
                                      <li><a href="#">JavaScript</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">About Us</a></li>
                                    </ul>
                                 </div>
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
