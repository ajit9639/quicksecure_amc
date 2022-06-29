<?php
include('include/config.php');

 $uid="";
   $email = $_POST["txtEMail"];

    $query=mysqli_query($conn,"SELECT * FROM tbl_dealer WHERE email='$email'");
    $num=mysqli_fetch_array($query);
    if($num>0)
{
 $uid=$num['uid'];
}
     
  
   //  echo "UID = ".$uid;
  //exit(); 
    

$to = $email; 
$from = 'kamlesh0657@gmail.com'; 
//$fromName = $name; 
 
$subject = "Forgot Password"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title></title> 
    </head> 
    <body> 
        <h1>Forgot Password</h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            
            <tr> 
                <th>&nbsp;</th><th align="left">E-Mail : </th><td>'.$email.'</td> 
            </tr> 

            <tr style="background-color: #e0e0e0;"> 
                <th>&nbsp;</th><th align="left">UID : </th><td>'.$uid.'</td> 
            </tr> 
 
        </table> 
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: Sys Admin'.'<'.$from.'>' . "\r\n"; 
//$headers .= 'Cc: welcome@example.com' . "\r\n"; 
//$headers .= 'Bcc: welcome2@example.com' . "\r\n"; 
 
// Send email 
if(mail($to, $subject, $htmlContent, $headers)){ 
    //echo 'Email has sent successfully.'."<br>"; 
echo '<script>alert("Email has sent successfully.");window.location.replace("https://partners.quicksecureindia.com/new-reg/forgot-password.php/");</script>';
     // echo "1".$to."<br>";  
     // echo "2".$subject."<br>";  
     // echo "3".$htmlContent."<br>";  
     // echo "4".$headers."<br>";
      //echo "5".$from."<br>";    
}else{ 
   echo 'Email sending failed.'; 
}

//header('location:index.php');

?>