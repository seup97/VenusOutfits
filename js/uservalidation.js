$(document).ready(function(){
    
  $("#user_role").change(function(){
      
      var role_id=$("#user_role").val();
      
      alert(role_id);
      
     var url="../controller/user_controller.php?status=get_functions";
     
     $.post(url,{role_id:role_id},function(data){
         
         $("#cont").html(data);
         
         
     });
      
      
  });
  
  
  $("form").submit(function (){
      
      var fname=$("#fname").val();
      var lname=$("#lname").val();
      var email=$("#email").val();
      var nic=$("#nic").val();
      var cno1=$("#cno1").val();
      var cno2=$("#cno2").val();
      var user_role=$("#user_role").val();
      
      if(fname=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>First Name Cannot Be Empty!!</b>");
          $("#fname").focus();
          
          return false;
      }
       if(lname=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Last Name Cannot Be Empty!!</b>");
          $("#lname").focus();
          
          return false;
      }
       if(email=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Email Cannot Be Empty!!</b>");
          $("#email").focus();
          
          return false;
      }
       if(nic=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>NIC Cannot Be Empty!!</b>");
          $("#nic").focus();
          
          return false;
      }
       if(cno1=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Contact Number 1 Cannot Be Empty!!</b>");
          $("#cno1").focus();
          
          return false;
      }
       if(cno2=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Contact Number 2 Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }
       if(user_role=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>User Role Cannot Be Empty!!</b>");
          $("#user_role").focus();
          
          return false;
      }
      
      var patternnicold = /^[0-9]{9}[vVxX]$/;
      var patternnicnew = /^[0-9]{12}$/;
      var patemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
      var patcnoland =/^\+94[0-9]{9}$/;
      var patcnomobile= /^\+947[0-9]{8}$/;


      if((!nic.match(patternnicold)) &&(!nic.match(patternnicnew)))
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>NIC is Invalid</b>");
          $("#nic").focus();
          
          return false;
      }
      if(!email.match(patemail))
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Email is Invalid</b>");
          $("#email").focus();
          return false;
      }
       if(!cno1.match(patcnoland))
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Contact Number 1 is Invalid</b>");
          $("#cno1").focus();   
          return false;
      }
        if(!cno2.match(patcnomobile))
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Contact Number 2 is Invalid</b>");
          $("#cno2").focus();
          
          return false;
      }
      
      var selectedcounter=0;
      
      $(".userfunctions").each(function (index){
         
          if($(this).is(":checked")){
              
              selectedcounter++;
              
          }
      
      });
      
        if(selectedcounter==0)
        {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>At Least 1 Function Should Be Selected!</b>");
      
          
          return false;
            
            
        }
      
      
      
  
      
      
      
      
      
      
      
  })
    
    
    
});

