<?php
    include '../commons/session.php';
    
    include '../model/purchasing_model.php';
    $purchasingObj = new Purchasing();
    
    $locationResult= $purchasingObj->getAlllocations();
    
   
    
    ///  getting user module information
    
    $moduleArray= $_SESSION["user_module"];
    
    include '../model/user_model.php';
    $userObj = new User();
    
    $activeResult= $userObj->getActiveUserCount();
    
    $activerow=$activeResult->fetch_assoc();
    
    ///  deactivated user count
    $deactiveResult= $userObj->getDeactiveUser();
    $deactiveCount=$deactiveResult->num_rows;
    
?>
<html>
    <head>
        <!--  include bootstrap css   -->
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        
        <!--   Leaflet css  -->
        
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
        
        <!--   leaflet js -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   
   <style type="text/css">
       #map { height: 180px; }
   </style>
   
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="../images/iconset/barcelona.png" width="100px" height="100px"/>
                </div>
                <div class="col-md-8">
                    <h1 align="center">EL Grocery Management System</h1>
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
                    <h4 align="center">Map Handling</h4>
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
                <form action="../controller/purchasing_controller.php?status=addlocation" method="post">
                    <div class="col-md-3 col-md-offset-3">
                        <div class="form-group">
                            <label class="control-label">Location Name</label>
                            <input type="text" name="location_name" class="form-control" required="required"/>
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Destination Location</label>
                            <input type="text" name="location" class="form-control" id="locationtxt" required="required"/>
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <br/>
                        <button type="submit" class="btn btn-success" >
                            <span class="glyphicon glyphicon-plus"></span>
                            &nbsp;
                            Add Location
                        </button>
                    </div>
                </form>
            </div>
            
            
            
            <div class="row">
                <div class="col-md-3">
                    <?php
                                        include_once '../includes/user-navigation.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <!-- This is the place where you map will be displayed -->
                    <div id="mapid" style="height: 500px;width:700">

                        </div>
               
                </div>
                
            </div>
        </div>
        <script>
            var mymap = L.map('mapid').setView([6.9271, 79.8612], 13);
            
            L.tileLayer('https://api.maptiler.com/maps/basic/{z}/{x}/{y}.png?key=7E42ivHJxJnzTrkqgX41', {
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
            maxZoom: 18,
            tileSize: 512,
            zoomOffset: -1,
            }).addTo(mymap);
           
             mymap.on('click', function(e){
                 var location= e.latlng;
                 console.log(e);
                 $("#locationtxt").val(location.lat+","+location.lng);
             });
             
             <?php
                while($locationrow=$locationResult->fetch_assoc())
                {
                    $latitude=$locationrow["latitude"];
                    $longitude=$locationrow["longitude"];
                    $locationName=$locationrow["location_name"];
                   ?>
             
             var marker = L.marker([<?php echo $latitude ?> , <?php echo $longitude ?> ]).addTo(mymap);
                 marker.bindPopup("<img src='../images/iconset/dollar.png' width='60' height='60'/>").openPopup();
             <?php
                }
             ?>
       </script>     
        
        
    </body>
    <!--   include jquery -->
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/loginvalidation.js"></script>
    <!-- include bootstrap js -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>