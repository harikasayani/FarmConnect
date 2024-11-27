<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Register</title>
    <link rel="stylesheet" href="register_farmers.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="background">
    <?php
        $servername="localhost:3308/";
        $username="root";
        $password="";
        $dbname="csp";
        $conn=mysqli_connect($servername,$username,$password,$dbname);
        if(!$conn){
            die("connection failed");
        }
        if(isset($_POST["finish"])){
            $name=$_POST["name"];
            $pswd=$_POST["password"];
            $confirm=$_POST["confirm"];
            $phone=$_POST["phone"];
            $address=$_POST["address"];
            if($pswd==$confirm){
                $sql="insert into farmer_register(name,password,confirm,phone,address) values('$name','$pswd','$confirm','$phone','$address')";
                if(mysqli_query($conn,$sql)){
                    header("location:login_farmer.php");
                }
                else{
                    echo "error".mysqli_error($conn);
                }
            }
            else{
                echo "<script>alert('Enter correct password')</script>";
            }
            }
            mysqli_close($conn);
        ?>
        <form action="register_farmer.php" method="post" class="form-container" name="consumer">
            <h1 style="color:green;">Register</h1>
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Enter name.." name="name" required>
            &nbsp;&nbsp;<input type="password" placeholder="Enter Password" name="password" required>
            &nbsp;&nbsp;<input type="password" placeholder="Confirm Password" name="confirm" required>
            &nbsp;&nbsp;<input type="tel" placeholder="Enter Phone number" name="phone" required><br><br>
            <textarea placeholder="Enter Address..." rows="8" cols="50" name="address" required></textarea><br><br>
            <input type="submit" value="Submit" name="finish">
        </form>
</div>
</body>
</html>