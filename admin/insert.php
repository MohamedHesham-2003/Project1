<?php
    include('config.php');

    if(isset($_POST['upload'])){
        $Name=$_POST['name'];
        $Price=$_POST['price'];
        // Handling the image upload
        $Image=$_FILES['image'];
        $image_location=$_FILES['image']['tmp_name'];
        $image_name=$_FILES['image']['name'];
        $image_up= "images/".$image_name;

        $Insert = "INSERT INTO products (name, price, image) VALUES ('$Name','$Price','$image_up')";
        
        mysqli_query($con, $Insert);
        if(move_uploaded_file($image_location, $image_up)){
            echo "<script> alert('تم رفع المنتج بنجاح') </script>";
        }
        else{
            echo "<script> alert('لم يتم رفع المنتج, لقد حدث خطأ ما!') </script>";
        }
        // Redirect back to the index page after uploading the image
        header('location: index.php');
        
    }
?>