<?php
//message
$msg='';
$msgClass='';
if(filter_has_var(INPUT_POST,'submit'))
{   $name=htmlspecialchars($_POST['name']);
    $email=htmlspecialchars($_POST['email']);
    $message=htmlspecialchars($_POST['message']);
    if(!empty($name) && !empty($email) && !empty($message))
      {
         if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
         {
          $msg="please enter valid email";
          $msgClass='alert-danger';
         }else{
               $toEmail='hamidsouaidi30@gmail.com';
               $subject='Contact Request From'.$name;
                $body='<h2> Contact Request </h2>
               <h4>name</h4><p>'.$name.'</p>
               <h4>Email</h4><p>'.$email.'</p>
               <h4>Message</h4><p>'.$message.'</p>
                ';
               $headers="MIME-Version: 1.0"."\r\n";
               $headers.="Content-Type:text/html;charset=UTF-8"."\r\n";
               $headers.="From:".$name."<".$email.">"."\r\n";
                if(mail($toEmail,$subject,$body,$headers)){
                     $msg='email send';
                     $msgClass='alert-success';
                  }else{
                      $msg='email fail';
                     $msgClass='alert-danger';
                  }  
            }
    

}else{
$msg="please fill the filds";
$msgClass='alert-danger';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>contact us</title>
</head>
<body>
    <nav class="navbar ">
    <div class="container">
    <h1><a href="index.php">my website </a></h1>
    
    </div>
    </nav>
    <div class="container">
    <?php if($msg!=''):?>
    <div class="alert <?php echo $msgClass;?> ">
    <?php echo $msg;?>
    
    </div>
    <?php endif;?>
    <form action="index.php" method="post">
    <div class="form-group">
    <label for="full name">full name</label>
    <input type="text" value="<?php echo isset($_POST['name'])? $name:'';?>" name="name" class="form-control" id="">
   <label for="email">email</label>
   <input type="email"  value="<?php echo isset($_POST['email'])? $email:'';?>" name="email" class="form-control">
   <label>Message</label>
   <textarea name="message"  class="form-control" id="" cols="30" rows="10">
   <?php echo isset($_POST['message'])? $message:'';?></textarea>
  <button name="submit" type="submit">submit</button>
   </div>
    
    </form>
    </div>
</body>
</html>
