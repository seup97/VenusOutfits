<?php

include_once '../commons/dbconnection.php';
$dbconnection= new dbConnection();

class customer{
    
    public function addCustomer($fname, $lname, $cno1,$cno2,$email,$nic)
    {
        $conn= $GLOBALS["conn"];
        $sql="INSERT INTO customer(customer_fname,customer_lname,customer_cno1,customer_cno2,customer_email,customer_nic)VALUES"
                . "('$fname','$lname','$cno1','$cno2','$email','$nic')";
        $result=$conn->query($sql) or die($conn->error);
        return $conn->insert_id;
        return $result;
        
  
    }

    public function getAllCustomers()
    {
        $conn= $GLOBALS["conn"];
        $sql="SELECT * FROM customer";
        $result=$conn->query($sql) or die($conn->error);
        return $result;
        
    }
    public function getSpecificCustomer($customer_id)
    {
        $conn= $GLOBALS["conn"];
        $sql="SELECT * FROM customer WHERE customer_id= '$customer_id'";
        $result=$conn->query($sql) or die($conn->error);
        return $result;
    }
    public function activateCustomer($customer_id)
    {
        $conn= $GLOBALS["conn"];
        $sql="UPDATE customer SET customer_status=1 WHERE customer_id='$customer_id'";
        $result=$conn->query($sql) or die($conn->error);  
    }
    
     public function deactivateCustomer($customer_id)
    {
        $conn= $GLOBALS["conn"];
        $sql="UPDATE customer SET customer_status=0 WHERE customer_id='$customer_id'";
        $result=$conn->query($sql) or die($conn->error); 
       
        
    }
     public function getActiveCustomerCount()
    {
        $conn= $GLOBALS["conn"];
        $sql="SELECT COUNT(customer_id) as activeCustomerCount FROM customer  WHERE customer_status='1'";
        $result=$conn->query($sql) or die($conn->error);  
        return $result;
        
    }
    
    public function getDeactiveCustomerCount()
    {
        $conn= $GLOBALS["conn"];
        $sql="SELECT * FROM customer WHERE customer_status='0'";
        $result=$conn->query($sql) or die($conn->error);  
        return $result;
        
    }
    public function updateCustomer($fname, $lname, $address, $cno1,$cno2,$email,$nic,$country,$city,$state,$postalcode)
    {
        
         $conn= $GLOBALS["conn"];

            $sql="UPDATE customer SET "
                    . "customer_fname='$fname',"
                    . "customer_lname='$lname',"
                    ."customer_address='$address',"
                    ." customer_cno1='$cno1',"
                    ." customer_cno2='$cno2',"
                    . "customer_email='$email',"
                    . "customer_nic='$nic',"
                    . "customer_country='$country',"
                    . "customer_city='$city',"
                    . "customer_state='$state',"
                    . "customer_postalcode='$postalcode',"
                    . "WHERE customer_id='$customer_id'";
            
       
       
        $result=$conn->query($sql) or die($conn->error) or die($conn->error);  
        
        
    }
    public function addCustomerAddress(){
        $conn= $GLOBALS["conn"];
        $sql="INSERT INTO customer_address(customer_id,door_number,street,country,city,state,postalcode)VALUES"
                . "('$customer_id','$address_no','$address_street','$country','$address_city','$state','$postalcode')";
        $result=$conn->query($sql) or die($conn->error);
        return $conn->insert_id;
        return $result;
    }
}