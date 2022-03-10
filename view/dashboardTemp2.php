<?php
    include '../commons/session.php';
    
      ///  getting user module information
    include '../model/user_model.php';
    $userObj = new User();
    //   getting all users
    
    $userResult = $userObj->getAllUsers();
    
    ///  getting user module information
    
    $moduleArray= $_SESSION["user_module"];
?>
<html>
    <head>

        <!--  include bootstrap css   -->
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <style>
           body {
            margin: 0;
            font-family: "Lato", sans-serif;
          }

          .sidenav {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
          }

          .sidenav a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
            font-weight: bold;
            font-size:20px;
          }
          .sidenav img{
              height: 150px;
              width: 150px;
                padding: 16px;
                align-items: center;
                border-radius: 50%;
          }

          .sidenav a.active {
            background-color: #04AA6D;
            color: white;
          }

          .sidenav a:hover:not(.active) {
            background-color: #555;
            color: white;
          }

          div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
          }

          @media screen and (max-width: 700px) {
            .sidenav {
              width: 100%;
              height: auto;
              position: relative;
            }
            .sidenav a {float: left;}
            div.content {margin-left: 0;}
          }

          @media screen and (max-width: 400px) {
            .sidenav a {
              text-align: center;
              float: none;
            }
          }
          .container{
              margin-left: 275px;
          }
          
 </style>
</head>
<body>       
       <div class="sidenav">
           <div>
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
           </div>
            <img src="../images/user_images/<?php echo $userImage ?> "/>
            <a href="../view/dashboardTemp2.php"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a>
            <a href="../view/user.php"><i class="fa fa-user"></i>&nbsp; Users</a>
            <a href="#"><i class="fa fa-handshake-o"></i>&nbsp;Suppliers</a>
            <a href="#"><i class="fa fa-user-plus"></i>&nbsp;Customers</a>
            <a href="../view/product.php"><i class="fa fa-list-alt"></i></span>&nbsp;Product</a>
            <a href="#"><i class="fa fa-truck"></i>&nbsp; Delivery</a>
            <a href="#"><i class='fa fa-send'></i>&nbsp; Orders</a>
            <a href="#"><i class='fa fa-line-chart'></i>&nbsp; Stock</a>
            <a href="#"><i class='fa fa-line-arrow'></i>&nbsp; Logout</a>
           <?php
            }
            ?>
       </div>
            <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="../images/iconset/venusOutfits1.png" width="100px" height="100px" alt="Avatar"/>
                </div>
                <div class="col-md-8">
                    <h1 align="center">Clothing Store Management System</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-user"></span>
                    &nbsp;
                    <?php
                       echo ucwords($_SESSION["user"]["user_fname"]." ".$_SESSION["user"]["user_lname"]) ;
                    ?>
                </div>
                <div class="col-md-8">
                    <h3 align="center" style="font-weight: bold"> <?php echo ucwords($_SESSION["user"]["role_name"]); ?>&nbsp; Panel</h3>
                </div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-bell"></span>
                    &nbsp;
                    <button class="btn btn-primary">Logout</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <?php
                    foreach ($moduleArray as $mod)
                    {
                ?>
                <a href="<?php  echo $mod["module_url"]; ?>">
                    <div class="col-md-3">
                        <div class="panel" style="height:150px;background-color: #45b1f5">
                            <h4 align="center" style="font-weight: bold">
                               <?php
                                echo ucwords($mod["module_name"])
                             ?>
                            </h4>
                            <img  src="../images/iconset/<?php echo $mod["module_image"]  ?>" width="100px" height="100px" align="center"
                                  style="margin-left:80px"
                                  />

                        </div>
                    </div>
                </a>
                <?php
                    }
                ?>
            </div>
                
        </div>
    </body>
    <!--   include jquery -->
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/loginvalidation.js"></script>
    <!-- include bootstrap js -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>