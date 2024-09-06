<?php

include 'admin/config.php';

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($con, $_POST['name']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($con, md5($_POST['cpassword']));

   $checkUser = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' ");
   $checkEmail = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' ");
   if(mysqli_num_rows($checkUser) > 0){
      $message[] = 'User already exist!';
   }
   else{
      if(mysqli_num_rows($checkEmail) > 0){
         $message[] = 'This email is already used!';
      }
      else{
         if($pass!= $cpass){
            $message[] = 'Password and confirm password does not match!';
   
         }
         else{
            mysqli_query($con, "INSERT INTO `users`(username, email, password) VALUES('$username', '$email', '$pass')") or die('query failed');
            $message[] = 'Registered successfully!';
            header('location:login.php');
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      input{
         text-align: center;
      }
   </style>
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $msg){
      echo '<div class="message" onclick="this.remove();">'.$msg.'</div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>انشاء حساب جديد</h3>
      <input type="text" name="name" required placeholder="اسم السمتخدم" class="box">
      <input type="email" name="email" required placeholder="البريد الالكتروني" class="box">
      <input type="password" name="password" required placeholder="كلمة المرور" class="box"
      minlength="4" maxlength="20">
      <input type="password" name="cpassword" required placeholder="تأكيد كلمة المرور" class="box">
      <input type="submit" name="submit" class="btn" value="تسجيل حساب">
      <p>هل لديك حساب؟ <a href="login.php"> تسجيل دخول</a></p>
   </form>

</div>

</body>
</html>