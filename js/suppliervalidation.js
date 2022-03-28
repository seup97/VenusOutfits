 $("form").submit(function (){
 
 var url="../controller/supplier_controller.php?status=add-supplier";
      
      var companyName=$("#comapnyName").val();
      var email=$("#email").val();
      var doorno=$("#doorno").val();
      var street=$("#street").val();
      var cno1=$("#cno1").val();
      var cno2=$("#cno2").val();
      var country=$("#country").val();
      var state=$("#state").val();
      var city=$("#city").val();
      var postalcode=$("#postalcode").val();
      var industry=$("#industry").val();
      var psdescription=$("#psdescription").val();
      var contactName=$("#contactName").val();
      var contactemail=$("#contactemail").val();
      var companyPosition=$("#companyPosition").val();
      var contactno=$("#contactno").val();
      var comments=$("#comments").val();
      
     
      if(companyName=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Company Name Cannot Be Empty!!</b>");
          $("#comapnyName").focus();
          
          return false; 
      }    
      if(email=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>First Name Cannot Be Empty!!</b>");
          $("#fname").focus();
          
          return false;
      }
      if(doorno=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>address Cannot Be Empty!!</b>");
          $("#address1").focus();
          
          return false;
      }
      if(address2=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>address Cannot Be Empty!!</b>");
          $("#address1").focus();
          
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
      if(country=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Country Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }
      if(state=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>State Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }
      if(city=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>City Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }
      if(postalcode=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Postal code Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }
     if(industry=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Industry Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }
      if(psdescription=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Product/Service description Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }
       if(contactName=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Contact Name Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }
      if(contactemail=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Contact email Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }
      if(companyPosition=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Company Position Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }
      if(contactno=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>Contact number Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }
      if(comments=="")
      {
          $("#alertdiv").addClass("alert alert-danger");
          $("#alertdiv").html("<b>comments Cannot Be Empty!!</b>");
          $("#cno2").focus();
          
          return false;
      }

      var patemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
      var patcnoland =/^\+94[0-9]{9}$/;
      var patcnomobile= /^\+947[0-9]{8}$/;

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
 
});




