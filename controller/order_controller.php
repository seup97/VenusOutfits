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
    include '../model/customer_model.php';
    
    $supplierObj= new supplier();
    $customerObj=new customer();


    
    $status=$_REQUEST["status"];
   
   switch ($status)
   {
case getCustomerData:
    
    $cus_id = $_POST["customer_id"];
    
    $customerResult = $customerObj->getSpecificCustomer($cus_id);
    while($customer_row=$customerResult->fetch_assoc())
    {
        ?>
<p><?php echo $customer_row[""]  ?></p>
<?php
    }
		
}} 