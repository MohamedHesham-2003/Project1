<?php
    include('config.php');

    $ID = $_GET['id'];
    $Delete=mysqli_query($con, "DELETE FROM products WHERE id =$ID");
    if($Delete) {
        echo "<script> alert('تم حذف المنتج بنجاح') </script>";
    } else {
        echo "<script> alert('لم يتم حذف المنتج, لقد حدث خطأ ما!') </script>";
    }
    // Redirect back to the products page after deletion
    header('location: products.php')
?>