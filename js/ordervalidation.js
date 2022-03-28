$(document).ready(function(){
    
  $("#customer_id").change(function(){
      
      var customer_id=$("#customer_id").val();
     
      //alert(customer_id);
     var url="../controller/order_controller.php?status=getCustomerData";
     
     $.post(url,{customer_id:customer_id},function(data){
         
         $("#showaddress").html(data);
          $("#showphone").html(data);
         
         
    });
      
  });  
});  
