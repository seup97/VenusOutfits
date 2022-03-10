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
            .container{
               top: 0px;
            }
            
body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
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
  font-size: 25px;
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

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.container{
   margin-top: 0px;
}
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 5px;
}

.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #444;
  color: white;
}

.fa {font-size:50px;}
 </style>
</head>
<body>
    <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
    <div id="main">
               <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            <div class="col-md-2">
                <img src="../images/iconset/venusOutfits1.png" width="100px" height="100px" style="align-items:flex-start "/>
            </div>
            <div class="col-md-8">
                    <h1 align="center">Clothing Store Management System</h1>
                </div>
       </div> 
    </div>      
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="../view/dashboardTemp2.php"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</a>
            <a href="../view/user.php"><i class="fa fa-user"></i>&nbsp; Users</a>
            <a href="#"><i class="fa fa-handshake-o"></i>&nbsp;Suppliers</a>
            <a href="#"><i class="fa fa-user-plus"></i>&nbsp;Customers</a>
            <a href="../view/product.php"><i class="fa fa-list-alt"></i></span>&nbsp;Product</a>
            <a href="#"><i class="fa fa-truck"></i>&nbsp; Delivery</a>
            <a href="#"><i class='fa fa-send'></i>&nbsp; Orders</a>
            <a href="#"><i class='fa fa-line-chart'></i>&nbsp; Stock</a>
       </div>
            <div class="container"  >
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
                    <h3 align="center" style="font-weight: bold"> <?php echo ucwords($_SESSION["user"]["role_name"]); ?> Panel </h3>
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
                        <li>Add User</li>
                    </ul>
                </div>
            </div>
            <div class="row">
              <div class="column">
                <div class="card">
                  <p><i class="fa fa-user"></i></p>
                  <h3>11+</h3>
                  <p>Users</p>
                </div>
              </div>

              <div class="column">
                <div class="card">
                  <p><i class="fa fa-check"></i></p>
                  <h3>55+</h3>
                  <p>Orders</p>
                </div>
              </div>

              <div class="column">
                <div class="card">
                  <p><i class="fa fa-smile-o"></i></p>
                  <h3>100+</h3>
                  <p>Customers</p>
                </div>
              </div>

              <div class="column">
                <div class="card">
                  <p><i class="fa fa-coffee"></i></p>
                  <h3>100+</h3>
                  <p>Stock</p>
                </div>
              </div>
            </div>
        </div>

    </body>
    <!--   include jquery -->
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/loginvalidation.js"></script>
    <!-- include bootstrap js -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>
