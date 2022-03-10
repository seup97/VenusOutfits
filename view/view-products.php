<?php
    include '../commons/session.php';
    
    ///  getting product module information
    include '../model/product_model.php';
    include '../model/stock_model.php';
    $productObj= new Product();
    $stockObj = new Stock();
    //   getting all users
    
    $productResult = $productObj->getAllProducts();
    
    
    $moduleArray= $_SESSION["user_module"];
?>
<html>
    <head>
        <!--  include bootstrap css   -->
                <!--  include bootstrap css   -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!--   include jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- include bootstrap js -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
           <script>
         
         loadStock = function(productid)
         {
           
            var url="../controller/product_controller.php?status=load_stock_modal";
     
            $.post(url,{product_id:productid},function(data){
         
                $("#stockcont").html(data);

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
                    <h4 align="center">  View Products</h4>
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
                                        include_once '../includes/main-product-navigation.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="generated_product_report.php" class="btn btn-success">
                                <span class="glyphicon glyphicon-book"></span> &nbsp;
                                Generate Product Report
                            </a>
                        </div>    
                        <div class="col-md-4">    
                            <a href="generated_product_report.php?status=save" class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-save"></span> &nbsp;
                                Save Product Report
                            </a>
                        </div> 
                        <div class="col-md-4">    
                            <a href="../controller/product_controller.php?status=send_email" class="btn btn-success">
                                <span class="glyphicon glyphicon-envelope"></span> &nbsp;
                                Send As Email
                            </a>
                        </div>    
                  
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <table class="table table-striped" id="usertable">
                        <thead>
                            <tr style="background-color: #1796bd;color: #FFF">
                                <th>&nbsp;</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Available Stock</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($product_row=$productResult->fetch_assoc())
                                {
                                    $product_id= $product_row["product_id"];
                                    
                                $tot_qty=  $stockObj->getProductStock($product_id);
                                    
                            ?>
                            <tr>
                                 
                                <td>&nbsp;</td>
                                <td><?php echo ucwords($product_row["product_name"]); ?></td>
                                <td><?php echo ucwords($product_row["brand_name"]);  ?></td>
                                <td><?php echo ucwords($product_row["cat_name"]);  ?></td>
                                <td><?php echo "Rs ".$product_row["product_price"]; ?></td>
                                <td>
                                    <?php echo $tot_qty;  ?>  <?php echo $product_row["unit_name"];   ?>
                                </td>
                                
                                <td>
                                    <a href="view-user.php?user_id=<?php echo $product_id; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span>&nbsp;View</a>
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
           <div class="modal fade" id="modalStock" role="dialog">
    
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                      <form action="../controller/product_controller.php?status=add_stock" method="post">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button> 
                      <h4 class="modal-title"> <span class="glyphicon glyphicon-plus"></span>&nbsp; Add Stock  </h4>
                    </div>
                    <div class="modal-body">
                        <div id="stockcont">
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
    <!--   include jquery -->

</html>