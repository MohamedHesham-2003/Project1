<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عربتي | منتجاتي</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Cairo', sans-serif;
        }
        h3{
            font-faily: 'cairo', sans-serif;
            font-weight: 600px;
            margin: 20px 0;
        }
        main{
            width: 60%;
            margin-top: 40px;
            margin-bottom: 15px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            background-color: #007bff;
            color: #fff;
        }
        thead th {
            padding: 15px;
            text-align: center;
            font-size: 18px;
        }
        tbody td {
            padding: 15px;
            text-align: center;
            font-size: 16px;
            border-bottom: 1px solid #ddd;
        }
        tbody tr:hover {
            background-color: #f1f1f1;
        }
        tfoot{
            text-align: center;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        .back_to_productPage{
            display: block;
            text-decoration: none;
            font-size: 16px;
            margin-bottom: 25px;
        }
        .back_to_productPage:hover{
            color: red;
        }
        
    </style>
</head>
<body>
    <center>
        <h3>منتجاتك المحجوزة</h3>
        <main>
            <table class="table">
                <thead>
                    <?php
                        session_start(); 
                        if($_SESSION['user_name']=='admin' || $_SESSION['user_name']=='ADMIN'){ ?>
                            <tr>
                                <th scope="col">اسم المستخدم</th>
                                <th scope="col">اسم المنتج</th>
                                <th scope="col">سعر المنتج</th>
                                <th scope="col">حذف المنتج</th>
                            </tr>
                  <?php }
                        else{ ?>
                            <tr>
                                <th scope="col">اسم المنتج</th>
                                <th scope="col">سعر المنتج</th>
                                <th scope="col">حذف المنتج</th>
                            </tr>
                  <?php } ?>
                    
                </thead>
                <tbody>
                    <?php
                        include('config.php');

                       
                        if($_SESSION['user_name']=='admin' || $_SESSION['user_name']=='ADMIN'){
                            $Result = mysqli_query($con, "SELECT * FROM addcard");
                            while($row = mysqli_fetch_array($Result)){
                                echo "
                                <tr>
                                    <td>{$row['username']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['price']}</td>
                                    <td><a href='del_card.php?id={$row['id']}' class='btn btn-danger'>إزالة</a></td>
                                </tr>
                                ";
                            }
                        }
                        else{
                            $Username = $_SESSION['user_name'];
                            $Result = mysqli_query($con, "SELECT * FROM addcard WHERE username ='$Username' ");
                            while($row = mysqli_fetch_array($Result)){
                                echo "
                                <tr>
                                    <td>{$row['name']}</td>
                                    <td>{$row['price']}</td>
                                    <td><a href='del_card.php?id={$row['id']}' class='btn btn-danger'>إزالة</a></td>
                                </tr>
                                ";
                            }
                        }
                        
                    ?>
                </tbody>
                
                <?php
                    include('config.php');
        
                    $totalPrice=0;

                    if($_SESSION['user_name']=='admin' || $_SESSION['user_name']=='ADMIN'){
                        // Fetch the price of the products from the addcard table
                        $Result = mysqli_query($con, "SELECT price FROM addcard");
                        while ($row = mysqli_fetch_array($Result)){
                            $totalPrice+= (float)$row['price'];  
                        }
                    }
                    else{
                        $Result = mysqli_query($con, "SELECT price FROM addcard WHERE username ='$Username' ");
                        while ($row = mysqli_fetch_array($Result)){
                            $totalPrice+= (float)$row['price'];
                        }
                    }
                    
                ?>
                
                <tfoot>
                    <?php
                        if($_SESSION['user_name']=='admin' || $_SESSION['user_name']=='ADMIN'){ ?>
                            <tr>
                                <th colspan="2">السعر الكلي:</th>
                                <th><?php echo $totalPrice .'$';?></th>
                                <th><a href='clear_card.php' class='btn btn-danger'>إزالة الكل</a></th>
                            </tr>
                  <?php } 
                        else{ ?>
                            <tr>
                                <th>السعر الكلي:</th>
                                <th><?php echo $totalPrice .'$';?></th>
                                <th><a href='clear_card.php' class='btn btn-danger'>إزالة الكل</a></th>
                            </tr>
                  <?php } ?>         
                                
                </tfoot>                        
                
            </table>
        </main>
        <a href="shop.php" class="back_to_productPage">الرجوع لصفحة المنتجات</a>
    </center>
</body>
</html>
