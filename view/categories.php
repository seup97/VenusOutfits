<?php
    include '../commons/session.php';
    
    ///  getting user module information
    
    $moduleArray= $_SESSION["user_module"];
    
    
    include '../model/category_model.php';
    include '../model/brand_model.php';
    
    $categoryObj = new Category();
    $brandObj = new Brand();
    
    $categoryResult= $categoryObj->getAllCategories();
    $brandResult = $brandObj->getAllBrands();
    
    
?>
<html>
    <head>
        <!--  include bootstrap css   -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!--   include jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- include bootstrap js -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
   <script>
         loadCategory= function(catid)
         {
            var url="../controller/product_controller.php?status=load_category";
     
            $.post(url,{cat_id:catid},function(data){
         
         $("#dynamiccat").html(data);
         
         
             });
         }
         
         loadBrand = function(brandid)
         {
            var url="../controller/product_controller.php?status=load_brand";
     
            $.post(url,{brand_id:brandid},function(data){
         
         $("#dynamicbrand").html(data);
         
         
             });
             
         }
        
       
   </script>    
   
   
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
                <div class="col-md-8">
                    <h4 align="center">  Categories and Brands</h4>
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
            <?php
                if(isset($_REQUEST["msg"]) || isset($_REQUEST["error"]))
                {
            ?>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-3">
                    <?php
                        if(isset($_REQUEST["msg"]))
                        {
                    ?>
                    <div class="alert alert-success">
                        <?php
                            echo base64_decode($_REQUEST["msg"]);
                        ?>
                    </div>
                    <?php
                        }
                    ?>
                    <?php
                        if(isset($_REQUEST["error"]))
                        {
                    ?>
                    <div class="alert alert-danger">
                        <?php
                            echo base64_decode($_REQUEST["error"]);
                        ?>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <?php
                }
            ?>
            <div class="row">
                <div class="col-md-3">
                    <?php
                                        include_once '../includes/main-product-navigation.php';
                    ?>
                </div>
                <div class="col-md-9">
                    
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <a  href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    Add Category
                                </a>
                            </div>
                        </div>
                        <h4 align="center">Categories</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category Id</th>
                                    <th>Category Name</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($cat_row=$categoryResult->fetch_assoc())
                                    {
                                        $cat_id=$cat_row["cat_id"];
                                ?>
                                <tr>  
                                    <td><?php echo $cat_row["cat_id"];  ?></td>
                                    <td><?php echo ucwords($cat_row["cat_name"]);  ?></td>
                                    <th>
                                        <a  href="#" class="btn btn-warning" data-toggle="modal" data-target="#editCat"
                                            onclick="loadCategory('<?php echo $cat_id  ?>');"
                                            >
                                            <span class="glyphicon glyphicon-pencil"></span>&nbsp; Edit
                                        </a>
                                    </th>
                                    <th>
                                        <a  href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteCat"
                                            onclick="loadCategory('<?php echo $cat_id  ?>');"
                                            >
                                            <span class="glyphicon glyphicon-pencil"></span>&nbsp; Delete
                                        </a>
                                    </th>
                                </tr>    
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <a  href="#" class="btn btn-success" data-toggle="modal" data-target="#modalBrand">
                                    <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Brands
                                </a>
                            </div>
                        </div>
                       <h4 align="center">Brands</h4>
                       <table class="table">
                            <thead>
                                <tr>
                                    <th>Brand Id</th>
                                    <th>Brand Name</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while($brand_row=$brandResult->fetch_assoc())
                                {
                                    $brand_id=$brand_row["brand_id"];
                                ?>
                                <tr>
                                    <td><?php  echo $brand_row["brand_id"]; ?></td>
                                    <td><?php  echo ucwords($brand_row["brand_name"]); ?></td>
                                    <th>
                                          <a  href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalBrandEdit"
                                              onclick="loadBrand('<?php echo $brand_id ?>');" >
                                            <span class="glyphicon glyphicon-pencil"></span>&nbsp; Edit
                                        </a>
                                    </th>
                                    <th>
                                        <a  href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalBrandDelete"
                                            onclick="loadCategory('<?php echo $cat_id  ?>');"
                                            >
                                            <span class="glyphicon glyphicon-pencil"></span>&nbsp; Delete
                                        </a>
                                    </th>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Category Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
          <form action="../controller/product_controller.php?status=add_category" method="post">
          
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
          <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"></span>&nbsp; Add Category </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3">
                    <label>Category Name</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="cat_name" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" >
                <span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Save
            </button>
            
          &nbsp;
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
        <!--- Edit Category Model  -->
        
        <div class="modal fade" id="editCat" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
          <form action="../controller/product_controller.php?status=update_category" method="post">
          
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
          <h4 class="modal-title"> <span class="glyphicon glyphicon-pencil"></span>&nbsp; Edit Category </h4>
        </div>
        <div class="modal-body">
            <div id="dynamiccat">
                
            </div>    
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" >
                <span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Save
            </button>
            
          &nbsp;
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
        
   <!--  Brand Model  -->
   

  <div class="modal fade" id="modalBrand" role="dialog">
    
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
          <form action="../controller/product_controller.php?status=add_brand" method="post">
          
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
          <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"></span>&nbsp; Add Brand </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3">
                    <label>Brand Name</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="brand_name" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" >
                <span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Save
            </button>
            
          &nbsp;
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
   
   <!--   Edit Brand  -->
   
   <div class="modal fade" id="modalBrandEdit" role="dialog">
    
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
          <form action="../controller/product_controller.php?status=update_brand" method="post">
          
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
          <h4 class="modal-title"> <span class="glyphicon glyphicon-pencil"></span>&nbsp; Edit Brand </h4>
        </div>
        <div class="modal-body">
            <div id="dynamicbrand">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" >
                <span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Save
            </button>
            
          &nbsp;
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
        
        
        
    </body>
    
</html>