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
    include '../model/product_model.php';
    include '../model/stock_model.php';
    
    $stockObj = new Stock();
    
     $productObj= new Product();

    
    $status=$_REQUEST["status"];
   
   switch ($status)
   {

       case "load_stock_modal":
           $product_id=$_POST["product_id"];
           
           $productResult= $productObj->getSpecificProduct($product_id);
           $product_row=$productResult->fetch_assoc();
           ?>
                    <input type="hidden" name="product_id" value="<?php echo $product_row["product_id"]; ?>" />
                    <div class="row">
                        <div class="col-md-6">
                            <label>Product Name : <?php echo ucwords($product_row["product_name"]);  ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Stock Date</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="stock_date" max="<?php echo date("Y-m-d"); ?>"/>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Added Quantity</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" name="stock_qty"/>
                                <span class="input-group-addon">
                                    <?php echo $product_row["unit_name"]; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    
           <?php
           break;
       
       case "add_stock":
           
           $product_id=$_POST["product_id"];
           $stock_date=$_POST["stock_date"];
           $stock_qty=$_POST["stock_qty"];
           
           
            try {
                 $stockObj->addStock($product_id, $stock_qty, $stock_date);
              if($product_id>0)
              {
                  $msg="Stock Successfully Added!!!";
                  $msg=  base64_encode($msg);
                 ?> 
                    <script> window.location="../view/view-products.php?msg=<?php echo $msg; ?>"</script>       
                  <?php
              }
              
            
                
            } catch (Exception $ex) {
                
                
            }
           
           
           
           
           break;
       case "send_email":
           
           include '../includes/email_includes.php';
               $receiver="sehup98@gmail.com";
            $username="sehup98@gmail.com";
            $mail->setFrom('mail@et.lk', 'Clothing Store manament System');
            $mail->addReplyTo('mail@et.lk', 'Clothing Store manament System');
            $mail->addAddress($username);   // Add a recipient
            $mail->addAddress($username);   // Add a recipient
            
            
            $mail->addCC($client_email);
            $mail->addBCC('bcc@example.com');
            
            
            $mail->AddAttachment('../documents/stock_report/stock_report');
           
             $mail->Subject = 'StockE Report';
            
            
            $mail->isHTML(true);  // Set email format to HTML
            $body="<h1>Hi</h1>";
            $body.="<img src='http://www.esoft.lk/wp-content/themes/esoft/assets/images/mainlogo.png' width='200px' height='80px' />";
                   
            $body.="<p>Dear Sir/Madam,<br> Please find the attached stock Report</p>";
             $mail->Body  = $body;
            if($mail->send())
            {
                echo "Mail Successfully Sent!!!";
                
            }
            
           break;
   }
}
