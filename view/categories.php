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
                    <h4 align="center">  Categories and Brands</h4>
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