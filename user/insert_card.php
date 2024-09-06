<?php
    include('config.php');
    session_start();


    if(isset($_POST['add'])){
       $Name=$_POST['name'];
       $Username=$_SESSION['user_name'];
       echo $Username;
       $Price=$_POST['price'];
       $Insert = "INSERT INTO addcard (username, name, price) VALUES ('$Username', '$Name','$Price')";
       mysqli_query($con, $Insert);
       header('location: shop.php');
        
    }
?>