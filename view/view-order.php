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
                    <img src="../images/iconset/venusOutfits1.png" width="100px" height="100px" alt="Avatar"/>
                </div>
                <div class="col-md-8">
                    <h1 align="center">Clothing Store Management System</h1>
                </div>
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
                    <h4 align="center">  View Suppliers</h4>
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
                                        include_once '../includes/supplier-navigation.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <table class="table table-striped" id="suppliertable" >
                        <thead>
                            <tr style="background-color: #1796bd;color: #FFF">
                                <th>#</th>
                                <th>Date created</th>
                                <th style="width: 200px">Company Name</th>
                                <th>Company Email</th>
                                <th>Company Telephone No</th>
                                <th>Address</th>
                                <th>Contact Name</th>
                                <th>Contact Email</th>
                                <th>Contact Number</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $i=1;
                                while($supplier_row=$supplierResult->fetch_assoc())
                                {
                                    $supplier_id=  base64_encode($supplier_row["supplier_id"]);
                                    
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo date("Y-m-d H:i",strtotime($supplier_row['date_created'])) ?></td>
                                <td><?php echo $$supplier_row["supplier_companyname"];?></td>
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
