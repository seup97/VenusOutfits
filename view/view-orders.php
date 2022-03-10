<?php
    include '../commons/session.php';
    
    ///  getting user module information
    include '../model/supplier_model.php';
    $supplierObj = new supplier();
    //   getting all users
    
    $supplierResult = $supplierObj->getAllSuppliers();
    
    
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
                    <h4 align="center">  View Orders</h4>
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
                                        include_once '../includes/order_includes.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <table class="table table-striped" id="suppliertable" >
                        <thead>
                            <tr style="background-color: #1796bd;color: #FFF">
                                <th>ID#</th>
                                <th>Date created</th>
                                <th style="width: 200px">Customer Name</th>
                                <th>Contact Number</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($supplier_row=$supplierResult->fetch_assoc())
                                {
                                    $supplier_id=  base64_encode($supplier_row["supplier_id"]);
                                    
                            ?>
                            <tr>
                                <td><?php echo $order ?></td>
                                <td><?php echo date("Y-m-d H:i",strtotime($supplier_row['date_created'])) ?></td>
                                <td><?php echo $supplier_row["supplier_companyname"];?></td>
                                <td><?php echo $$supplier_row["suplier_companyemail"];?></td>
                                <td><?php echo ($$supplier_row["suplier_cno1"]."/".$customer_row["suplier_cno2"]);  ?></td>
                                <td><?php echo ucwords($supplier_row["supplier_address1"]." ".$customer_row["supplier_address2"]);    ?></td>
                                <td><?php echo $$supplier_row["	supplier_contactperson"];?></td>
                                <td><?php echo $$supplier_row["supplier_contactemail"];  ?></td>
                                <td><?php echo $$supplier_row["customer_email"];  ?></td>
                                <td><?php echo $$supplier_row["supplier_cpno"]; ?></td>
                                <td><?php echo $$supplier_row["customer_city"];  ?></td>
                                <td>
                                    <?php
                                        if($supplier_row["supplier_status"]==1)
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
                                    <a href="view-supplier.php?supplier_id=<?php echo $supplier_id; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span>&nbsp;View</a>
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
                $("#suppliertable").DataTable();
            });
    </script>
</html>

