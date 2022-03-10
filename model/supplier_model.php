<?php

include_once '../commons/dbconnection.php';
$dbconnection= new dbConnection();

class supplier{
    
    public function addSupplier($companyName, $email, $address1, $address2, $cno1,$cno2,$country,$state,$city,$postalcode,$industry,$psdescription,$contactName,$contactemail,$companyPosition,$contactno,$comments)
    {
        $conn= $GLOBALS["conn"];
        $sql="INSERT INTO customer(supplier_companyName,supplier_companyemail,supplier_address1,supplier_address2,supplier_cno1,supplier_cno2,supplier_country,supplier_state,supplier_city,supplier_postalcode,supplier_industry,supplier_description,	supplier_contactperson,supplier_contactemail,supplier_companyposition,supplier_cpno,supplier_comment)VALUES"
                . "($companyName, $email, $address1, $address2, $cno1,$cno2,$country,$state,$city,$postalcode,$industry,$psdescription,$contactName,$contactemail,$companyPosition,$contactno,$comments)";
        $result=$conn->query($sql) or die($conn->error);
        return $conn->insert_id;
        return $result;
        
  
    }
    public function getAllSuppliers()
    {
        $conn= $GLOBALS["conn"];
        $sql="SELECT * FROM supplier";
        $result=$conn->query($sql) or die($conn->error);
        return $result;
        
    }
    public function getSpecificSupplier($supplier_id)
    {
        $conn= $GLOBALS["conn"];
        $sql="SELECT * FROM supplier WHERE supplier_id = '$supplier_id'";
        $result=$conn->query($sql) or die($conn->error);
        return $result;
    }
    public function activateSupplier($supplier_id)
    {
        $conn= $GLOBALS["conn"];
        $sql="UPDATE supplier SET supplier_status=1 WHERE  supplier_id = '$supplier_id'";
        $result=$conn->query($sql) or die($conn->error);  
    }
    
     public function deactivateSupplier($supplier_id)
    {
        $conn= $GLOBALS["conn"];
        $sql="UPDATE customer SET supplier_status=0 WHERE  supplier_id = '$supplier_id'";
        $result=$conn->query($sql) or die($conn->error); 
       
        
    }
     public function getActiveSupplierCount()
    {
        $conn= $GLOBALS["conn"];
        $sql="SELECT COUNT(customer_id) as activeCustomerCount FROM customer  WHERE customer_status='1'";
        $result=$conn->query($sql) or die($conn->error);  
        return $result;
        
    }
    
    public function getDeactiveSupplierCount()
    {
        $conn= $GLOBALS["conn"];
        $sql="SELECT * FROM supplier WHERE supplier_status='0'";
        $result=$conn->query($sql) or die($conn->error);  
        return $result;
        
    }
    public function updateSupplier($fname, $lname, $address, $cno1,$cno2,$email,$nic,$country,$city,$state,$postalcode)
    {
        
         $conn= $GLOBALS["conn"];

            $sql="UPDATE supplier SET "
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
}