$(document).ready(function(){
    
    $("#addnotebtn").click(function(){
        
       var reqdate=$("#reqdate").val();
       
       
      var url="../controller/purchasing_controller.php?status=add_note";
     
     $.post(url,{req_date:reqdate},function(data){
         
         $("#notedescription").html(data);

     });
     
     $("#btnaddnoteitem").click(function (){
         
         var productid=$("#prid").val();
         var qty=$("#qty").val();
         
          var url="../controller/purchasing_controller.php?status=add_note_item";
     
        $.post(url,{req_date:reqdate},function(data){

            $("#notedescription").html(data);

        });
         
         
     })
       
       
       
        
    });
 
    
});

