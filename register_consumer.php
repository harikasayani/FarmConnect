<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer Login</title>
    <link rel="stylesheet" href="register_consumers.css">
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
            $email=$_POST["email"];
            $pswd=$_POST["password"];
            $confirm=$_POST["confirm"];
            $phone=$_POST["phone"];
            $address=$_POST["address"];
            if($pswd==$confirm){
                $sql="insert into consumer_register(email,password,confirm,phone,address) values('$email','$pswd','$confirm','$phone','$address')";
                if(mysqli_query($conn,$sql)){
                   header("location:login_consumer.php");
                }
                else{
                    echo "error".mysqli_error($conn);
                }
            }
            else{
                echo "<script>alert('Enter correct Password');</script>";
            }
            }
            mysqli_close($conn);
        ?>
        <form action="register_consumer.php" method="post" class="form-container" name="consumer">
            <h1 style="color:green;">Register</h1>
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="email" placeholder="Enter Email.." name="email" required>
            &nbsp;&nbsp;<input type="password" placeholder="Enter Password" name="password" required>
            &nbsp;&nbsp;<input type="password" placeholder="Confirm Password" name="confirm" required>
            &nbsp;&nbsp;<input type="tel" placeholder="Phone Number" name="phone" required><br><br>
            <textarea placeholder="Enter Address..." rows="8" cols="50" name="address" required></textarea><br><br><br>
            <input type="submit" value="Submit" name="finish">
        </form>
</div>
</body>
</html>