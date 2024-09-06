<?php
    include('config.php');

    if(isset($_POST['update'])){
        $ID = $_POST['id'];
        $Name=$_POST['name'];
        $Price=$_POST['price'];
        // Handling the image upload
        $Image=$_FILES['image'];
        $image_location=$_FILES['image']['tmp_name'];
        $image_name=$_FILES['image']['name'];
        $image_up= "images/".$image_name;

        $Update = "UPDATE products SET name='$Name', price='$Price', image='$image_up' WHERE id='$ID' ";
        
        mysqli_query($con, $Update);
        if(move_uploaded_file($image_location, $image_up)){
            echo "<script> alert('تم تحديث المنتج بنجاح') </script>";
        }
        else{
            echo "<script> alert('لم يتم تحديث المنتج, لقد حدث خطأ ما!') </script>";
        }
        // Redirect back to the index page after uploading the image
        header('location: index.php');
        
    }
?>