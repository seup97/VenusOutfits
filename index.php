<?php
if(!empty($_SERVER["HTTPS"]) && ('on'==$_SERVER["HTTPS"]))
{
    
    $url="https://";
    
}
else{
    $url="http://";
    
}
$hostname=$_SERVER["HTTP_HOST"];  // facebook.com
$url=$url.$hostname;
?>
<script>window.location="<?php echo $url."/VenusOutfits/view/login1.php"?>"</script>
