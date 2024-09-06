<?php
    include('config.php');
    session_start();

    if($_SESSION['user_name']=='admin' || $_SESSION['user_name']=='ADMIN'){
        mysqli_query($con, "DELETE FROM addcard ");
        header('location: card.php');
    }
    else{
        $Username = $_SESSION['user_name'];
        mysqli_query($con, "DELETE FROM addcard where username = '$Username' ");
        header('location: card.php');
    }
    
    
?>