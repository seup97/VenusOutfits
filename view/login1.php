<html>
    <head>
        <!--  include bootstrap css   --> 
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/> 
        <link rel="stylesheet" type="text/css" href="../css/login1.css">
        
    </head>
    <body>
        <div class="bg-image">   
        </div>
        <div class="row"> 
            <div class="col-md-12">
                &nbsp;
            </div>
        </div> 
        <div id="bg-text">
        <div class="row">
            <div class="col-md-12">
                <h1 align="center">Clothing Store Management System</h1>
            </div>
         </div>   
         <div class="row">
            <div class="col-md-12">
                <h2> Welcome Back!</h2>
            </div>
        </div>
          <div class="row">
             <div class="col-md-12">
                 <h4>Login to the System</h4>
            </div>     
          </div>
         <div class="row">
             <div class="col-md-4">&nbsp;</div>
                <div class="col-md-4">
                    <div id="alertdiv"></div>
                </div>
            </div>
                   
            <?php
            
            if(isset($_GET["msg"]))
            {
            ?>
            
             <div class="row">
                 <div class="col-md-12">&nbsp;</div>
             </div>  
            <div class="row">
                <div class="col-md-4">&nbsp;</div>
                 <div class="col-md-4">
                     <div class="alert alert-danger">
                         <?php
                            echo base64_decode($_GET["msg"]);
                         ?>
                     </div>
                     
                 </div>
            </div>
            <?php
            }
            ?>
        <form action="../controller/login_controller.php?status=login" method="post" >    
        <div class="row">
           
            <div class="col-md-4">
                 &nbsp;
            </div>    
            <div class="col-md-4">
                <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username"/>
                </div>
            </div>
        </div>    
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </span>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
                <div class="row">
                     <div class="col-md-4">&nbsp;</div>
                    <div class="col-md-4">
                        <button type="submit" name="Login" style="background-color: green;color:#FFF;font-weight: bold" class="btn  btn-block">LOGIN</button>
                    </div>
                </div>
            </form> 
           </div> 
            
          <div class="col-md-4" >
                   &nbsp;
           </div>      
    </body>
    <!--   include jquery -->
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/loginvalidation.js"></script>
    <!-- include bootstrap js -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>  
           

