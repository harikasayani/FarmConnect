<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Dashboard</title>
    <link rel="stylesheet" href="farmer_dboards.css">
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
    <div class="add">
        <?php
            $servername="localhost:3308/";
            $username="root";
            $password="";
            $dbname="csp";
            $conn=mysqli_connect($servername,$username,$password,$dbname);
            if(!$conn){
                die("connection failed");
            }
            if(isset($_POST['submit'])){
                $name=$_POST["name"];
                $phone=$_POST['phone'];
                $image=$_POST["image"];
                $price=$_POST["price"];
                $sql="insert into addproducts(name,phone,image,price) values('$name','$phone','$image','$price')";
                if(mysqli_query($conn,$sql)){
                    echo "inserted";
                }
                else{
                    echo "not inserted";
                }
        }
        ?>
        <form action="farmer_dashboard.php" method="post" name="adding">
            <h1 style="color:green;padding-left:20%;">Add Products</h1><br><br>
            <input type="text" name="name" id="name" placeholder="Enter Product Name" required><br><br>
            <input type="number" name="phone" id="phone" placeholder="Phone Number" requierd><br><br>
            <input type="file" name="image" id="image" action=" .jpg, .jpeg, .png"><br><br>
            <input type="number" name="price" placeholder="Enter Price" required><br><br><br>
            <input type="submit" value="Add" name="submit"> <br><br><br><br>
        </form>
    </div>
</body>
</html>