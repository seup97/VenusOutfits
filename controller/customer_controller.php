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
    include '../model/customer_model.php';
    
    $customerObj= new customer();


    
    $status=$_REQUEST["status"];
   
   switch ($status)
   {
       case "add_customer":
                $fname=$_POST["fname"];
                $lname=$_POST["lname"];
                $address_no=$_POST["addressno"];
                $address_street=$_POST["street"];
                $address_city=$_POST["city"];
                $cno1=$_POST["cno1"];
                $cno2=$_POST["cno2"];
                $email=$_POST["email"];
                $nic=$_POST["nic"];
                $country=$_POST['country'];
                $state=$_POST["state"];
                $postalcode=$_POST["postalcode"];
                

               
                try {
                    if($fname=="")
                    {
                        throw new Exception("First Name is Empty!!!");
                    }
           
                    if($lname=="")
                    {
                        throw new Exception("Last Name is Empty!!!");

                    }
                    if($address_no=="")
                    {
                        throw new Exception("Address Number is Empty!!!");
                    } 
                    
                    if($address_street=="")
                    {
                        throw new Exception("Steet is Empty!!!");
                    } 

                    if($cno1=="")
                    {
                        
                         throw new Exception("Contact Number 1 Cannot be Empty!");
                    }
                    if($cno2=="")
                    {
                        
                         throw new Exception("Contact Number 2 Cannot be Empty!");
                    }
                    if($nic=="")
                    {
                        throw new Exception("NIC is Empty!!!");
                    }
                    if($country=="")
                    {
                        throw new Exception("Country is Empty!!!");
                    }    
                    if($address_city=="")
                    {
                        throw new Exception("City is Empty!!!");
                    }   
                    if($state=="")
                    {
                        throw new Exception("State is Empty!!!");
                    } 
                    if($postalcode=="")
                    {
                        throw new Exception("Postal Code is Empty!!!");
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
                    
                   $customer_id= $customerObj->addCustomer($fname, $lname,$cno1,$cno2,$email,$nic);
                    if($customer_id>0)
                    {
                        $customer_id= $customerObj->addCustomerAddress($customer_id,$address_no,$address_street,$address_city,$country,$state,$postalcode);
                        
                        $msg= "Customer Added Succesfully";
                        $msg=  base64_encode($msg);
                        ?>
                            <script> window.location="../view/view-customers.php?msg=<?php echo $msg; ?>"</script>
                        <?php
                    }
                    else{
                        
                        throw new Exception("Customer Not Inserted Succesfully!");
                    
                    }
                    
                } catch (Exception $ex) {
                    
                    $msg=$ex->getMessage();
                    
                    $msg=  base64_encode($msg);
                    
                    ?>
                        <script> window.location="../view/add-customer.php?msg=<?php echo $msg; ?>"</script>
                    <?php
                    
                }
               
           break;
           
            case "deactivate":
           $customer_id= base64_decode($_GET["customer_id"]);
           
           $customerObj->deactivateCustomer($customer_id);
           $msg="Customer Succesfully Deactivated";
           ?>
            <script> window.location="../view/view-customers.php?msg=<?php echo $msg; ?>"</script>
           <?php
           break;
       
       case "activate":
           $customer_id= base64_decode($_GET["customer_id"]);
           
           $customerObj->activateCustomer($customer_id);
           $msg="Customer Succesfully Activated";
           ?>
            <script> window.location="../view/view-customers.php?msg=<?php echo $msg; ?>"</script>
           <?php
           break;
       
       case "update_customer":
                $fname=$_POST["fname"];
                $lname=$_POST["lname"];
                $address=$_POST["address"];
                $cno1=$_POST["cno1"];
                $cno2=$_POST["cno2"];
                $email=$_POST["email"];
                $nic=$_POST["nic"];
                $country=$_POST['country'];
                $city=$_POST["city"];
                $state=$_POST["state"];
                $postalcode=$_POST["postalcode"];
                
                 try {
                    if($fname=="")
                    {
                        throw new Exception("First Name is Empty!!!");
                    }
           
                    if($lname=="")
                    {
                        throw new Exception("Last Name is Empty!!!");

                    }
                    if($address=="")
                    {
                        throw new Exception("Address  is Empty!!!");
                    } 

                    if($cno1=="")
                    {
                        
                         throw new Exception("Contact Number 1 Cannot be Empty!");
                    }
                    if($cno2=="")
                    {
                        
                         throw new Exception("Contact Number 2 Cannot be Empty!");
                    }
                    if($nic=="")
                    {
                        throw new Exception("NIC is Empty!!!");
                    }
                    if($country=="")
                    {
                        throw new Exception("Country is Empty!!!");
                    }    
                    if($city=="")
                    {
                        throw new Exception("City is Empty!!!");
                    }   
                    if($state=="")
                    {
                        throw new Exception("State is Empty!!!");
                    } 
                    if($postalcode=="")
                    {
                        throw new Exception("Postal Code is Empty!!!");
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
                   $customerObj->updateCustomer($fname, $lname, $address, $cno1,$cno2,$email,$nic,$country,$city,$state,$postalcode);
                   
                        $msg= "Customer $fname Is updated Succesfully";
                        $msg=  base64_encode($msg);
                        ?>
                            <script> window.location="../view/view-customers.php?msg=<?php echo $msg; ?>"</script>
                        <?php
                    
                } catch (Exception $ex) {
                    
                    $msg=$ex->getMessage();
                    
                    $msg=  base64_encode($msg);
                    
                    ?>
                        <script> window.location="../view/edit-customer.php?msg=<?php echo $msg; ?>"</script>
                    <?php
                    
                }
               
           break;
   }     
}