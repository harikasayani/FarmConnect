<?php
    $servername="localhost:3308/";
    $username="root";
    $password="";
    $dbname="csp";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("connection failed");
    }
    $sql="select * from addproducts";
    $result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="view_prds.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <nav>
    <ul>
            <li class="title">Farm Connect</li>
            <li class="attr"><a href="farmer_dashboard.php">Add Products</a></li>
            <li class="attr"><a href="view_products.php">View Products</a></li>
            <li class="attr"><a href="index.html">Logout</a></li>
        </ul>
    </nav>
    <?php
        while($row=mysqli_fetch_assoc($result)){
    ?>
    <main>
        <div class="card">
            <div class="image">
                <img src="<?php echo $row['image'];?>" alt="carrot">
            </div>
            <div class="caption">
                <p class="product-name">Name: <?php echo $row['name'];?></p>
                <p class="price">Price: Rs <?php echo $row['price'];?>/Kg</p>
                <button><i class='bx bxs-phone-call'></i>&nbsp;&nbsp;<?php echo $row['phone'];?></button>
            </div>
        </div>
    <?php 
        }
    ?>
    </main>
</body>
</html>