<?php

include '../commons/session.php';

if(!isset($_GET["status"]))
{    
   ?>
<script> window.location="../view/login.php"</script>
    <?php
}
else
{
    include '../model/supplier_model.php';
    
    $supplierObj= new supplier();


    
    $status=$_REQUEST["status"];
   
   switch ($status)
   {
       case "add_supplier":
                $companyName=$_POST["companyName"];
                $email=$_POST["email"];
                $address1=$_POST["address1"];
                $address2=$_POST["address2"];
                $cno1=$_POST["cno1"];
                $cno2=$_POST["cno2"];
                $country=$_POST['country'];
                $state=$_POST["state"];
                $city=$_POST["city"];
                $postalcode=$_POST["postalcode"];       
                $industry=$_POST["industry"];
                $psdescription=$_POST["psdescription"];
                $contactName=$_POST["contactName"];
                $contactemail=$_POST["contactemail"];
                $companyPosition=$_POST["companyPosition"];
                $contactno=$_POST["contactno"];
                $comments=$_POST["comments"];

               
                try {
                    if($companyName=="")
                    {
                        throw new Exception("Company Name is Empty!!!");
                    }
           
                    if($email=="")
                    {
                        throw new Exception("Email is Empty!!!");

                    }
                    if($address1=="")
                    {
                        throw new Exception("Address 1 is Empty!!!");
                    } 
                     if($address2=="")
                    {
                        throw new Exception("Address 2 is Empty!!!");
                    } 

                    if($cno1=="")
                    {
                        
                         throw new Exception("Contact Number 1 Cannot be Empty!");
                    }
                    if($cno2=="")
                    {
                        
                         throw new Exception("Contact Number 2 Cannot be Empty!");
                    }
                    if($country=="")
                    {
                        throw new Exception("Country is Empty!!!");
                    }
                    if($state=="")
                    {
                        throw new Exception("State is Empty!!!");
                    } 
                    if($city=="")
                    {
                        throw new Exception("City is Empty!!!");
                    } 
                     if($postalcode=="")
                    {
                        throw new Exception("Postal Code is Empty!!!");
                    } 
                     if($industry=="")
                    {
                        throw new Exception("Industry is Empty!!!");
                    } 
                     if($psdescription=="")
                    {
                        throw new Exception("Product/Serives Description is Empty!!!");
                    } 
                     if($contactName=="")
                    {
                        throw new Exception("Contact Name is Empty!!!");
                    } 
                     if($contactemail=="")
                    {
                        throw new Exception("Contact Email is Empty!!!");
                    } 
                     if($companyPosition=="")
                    {
                        throw new Exception("Company Position is Empty!!!");
                    } 
                     if($contactno=="")
                    {
                        throw new Exception("Conact Number is Empty!!!");
                    } 
                     if($comments=="")
                    {
                        throw new Exception("Comment field is Empty!!!");
                    } 

                     
                    ///  regular Expression validation
                    $patcno1="/^\+94[0-9]{9}$/";
                    $patemail="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                    
                    if(!preg_match($patcno1, $cno1))
                    {
                        throw new Exception("Contact Number 1 is Invalid!!!");
                    }
                    
                    if(!preg_match($patemail, $email))
                    {
                        
                         throw new Exception("Invalid Email");
                        
                    }
                    
                    
                   $supplier_id= $supplierObj->addSupplier($companyName, $email, $address1, $address2, $cno1,$cno2,$country,$state,$city,$postalcode,$industry,$psdescription,$contactName,$contactemail,$companyPosition,$contactno,$comments);
                    if($supplier_id>0)
                    {
                        $msg= "Supplier Added Succesfully";
                        $msg=  base64_encode($msg);
                        ?>
                            <script> window.location="../view/view-suppliers.php?msg=<?php echo $msg; ?>"</script>
                        <?php
                    }
                    else{
                        
                        throw new Exception("Supplier Not Inserted Succesfully!");
                    
                    }
                    
                } catch (Exception $ex) {
                    
                    $msg=$ex->getMessage();
                    
                    $msg=  base64_encode($msg);
                    
                    ?>
                        <script> window.location="../view/add-supplier.php?msg=<?php echo $msg; ?>"</script>
                    <?php
                    
                }
               
           break;
           
            case "deactivate":
           $supplier_id= base64_decode($_GET["customer_id"]);
           
           $suplierObj->deactivateCustomer($supplier_id);
           $msg="Supplier Succesfully Deactivated";
           ?>
            <script> window.location="../view/view-customers.php?msg=<?php echo $msg; ?>"</script>
           <?php
           break;
       
       case "activate":
           $supplier_id= base64_decode($_GET["supplier_id"]);
           
           $supplierObj->activateCustomer($supplier_id);
           $msg="Supplier Succesfully Activated";
           ?>
            <script> window.location="../view/view-suppliers.php?msg=<?php echo $msg; ?>"</script>
           <?php
           break;
       
       case "update_customer":
                 $companyName=$_POST["companyName"];
                $email=$_POST["email"];
                $address1=$_POST["address1"];
                $address2=$_POST["address2"];
                $cno1=$_POST["cno1"];
                $cno2=$_POST["cno2"];
                $country=$_POST['country'];
                $state=$_POST["state"];
                $city=$_POST["city"];
                $postalcode=$_POST["postalcode"];       
                $industry=$_POST["industry"];
                $psdescription=$_POST["psdescription"];
                $contactName=$_POST["contactName"];
                $contactemail=$_POST["contactemail"];
                $companyPosition=$_POST["companyPosition"];
                $contactno=$_POST["contactno"];
                $comments=$_POST["comments"];

               
                try {
                    if($companyName=="")
                    {
                        throw new Exception("Company Name is Empty!!!");
                    }
           
                    if($email=="")
                    {
                        throw new Exception("Email is Empty!!!");

                    }
                    if($address1=="")
                    {
                        throw new Exception("Address 1 is Empty!!!");
                    } 
                     if($address2=="")
                    {
                        throw new Exception("Address 2 is Empty!!!");
                    } 

                    if($cno1=="")
                    {
                        
                         throw new Exception("Contact Number 1 Cannot be Empty!");
                    }
                    if($cno2=="")
                    {
                        
                         throw new Exception("Contact Number 2 Cannot be Empty!");
                    }
                    if($country=="")
                    {
                        throw new Exception("Country is Empty!!!");
                    }
                    if($state=="")
                    {
                        throw new Exception("State is Empty!!!");
                    } 
                    if($city=="")
                    {
                        throw new Exception("City is Empty!!!");
                    } 
                     if($postalcode=="")
                    {
                        throw new Exception("Postal Code is Empty!!!");
                    } 
                     if($industry=="")
                    {
                        throw new Exception("Industry is Empty!!!");
                    } 
                     if($psdescription=="")
                    {
                        throw new Exception("Product/Serives Description is Empty!!!");
                    } 
                     if($contactName=="")
                    {
                        throw new Exception("Contact Name is Empty!!!");
                    } 
                     if($contactemail=="")
                    {
                        throw new Exception("Contact Email is Empty!!!");
                    } 
                     if($companyPosition=="")
                    {
                        throw new Exception("Company Position is Empty!!!");
                    } 
                     if($contactno=="")
                    {
                        throw new Exception("Conact Number is Empty!!!");
                    } 
                     if($comments=="")
                    {
                        throw new Exception("Comment field is Empty!!!");
                    } 

                     
                    ///  regular Expression validation
                    $patnic="/[0-9]{9}[vVxX]$/";
                    $patcno1="/^\+94[0-9]{9}$/";
                    $patemail="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                    
                    if(!preg_match($patnic, $nic))
                    {
                          throw new Exception("Invalid NIC Format");
                    }
                    
                    if(!preg_match($patcno1, $cno1))
                    {
                        throw new Exception("Contact Number 1 is Invalid!!!");
                    }
                    
                    if(!preg_match($patemail, $email))
                    {
                        
                         throw new Exception("Invalid Email");
                        
                    }
                    
                   $customerObj->updateSupplier($companyName, $email, $address1, $address2, $cno1,$cno2,$country,$state,$city,$postalcode,$industry,$psdescription,$contactName,$contactemail,$companyPosition,$contactno,$comments);
                   
                        $msg= "Supplier $companyName Is updated Succesfully";
                        $msg=  base64_encode($msg);
                        ?>
                            <script> window.location="../view/view-suppliers.php?msg=<?php echo $msg; ?>"</script>
                        <?php
                    
                } catch (Exception $ex) {
                    
                    $msg=$ex->getMessage();
                    
                    $msg=  base64_encode($msg);
                    
                    ?>
                        <script> window.location="../view/edit-supplier.php?msg=<?php echo $msg; ?>"</script>
                    <?php
                    
                }
               
           break;
   }     
}