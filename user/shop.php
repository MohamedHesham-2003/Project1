<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | المنتجات</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="css/stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        
        h3{
            font-family: 'cairo', sans-serif;
            margin: 10px 0 25px 0;
        }
        .card{
            float: right;
            margin: 10px;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card img{
            width: 100%;
            height: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Slight shadow for a better visual */
        }
        main{
            width: 60%;
            margin: auto;
        }
        .navbar-brand{
            margin-left: 70px;
        }
        .hello{
            color: white;
            margin-right: 15px; 
        }
        .out{
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
        session_start(); // Start the session if it hasn't been started already
    ?>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="card.php">Mycard | عربتي</a>

        <div class="hello">
            <?php if(isset($_SESSION['user_name'])){ ?>
                <span>مرحبًا، <?php echo $_SESSION['user_name']; ?> |</span>
            <?php } ?>
            <a href="../login.php" class="out"> تسجيل الخروج</a>
        </div>
        
    </nav>
    <center>
        <h3>جميع المنتجات المتوفرة</h3>

    </center>
    <?php
        include('config.php');
        $result=mysqli_query($con, "SELECT * FROM products");
        while($row=mysqli_fetch_array($result)){
            echo "
            <center>
                <main>
                    <div class='card' style='width: 15rem;'>
                        <img src='$row[image]' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$row[name]</h5>
                            <p class='card-text'>$row[price]</p>
                            <a href='validate.php? id=$row[id]' class='btn btn-success'>إضافة لعربة التسوق </a>
                        </div>
                    </div>
                </main>
            </center>
            ";
        }
    ?>

    
    
    
</body>
</html>