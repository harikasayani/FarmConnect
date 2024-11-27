<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer Login</title>
    <link rel="stylesheet" href="login_consumers.css">
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
                $sql="select * from consumer_register where email='$email' and password='$pswd' ";
                $res=mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)==1){
                    header("location:consumer_dashboard.php");
                }
                else{
                    echo "<script>alert('Enter correct Email or Password');</script>";
                }
            }
        ?>
        <form action="login_consumer.php" method="post" class="form-container" name="consumer">
            <h1 style="color:green">Login</h1>
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="email" placeholder="Enter Email.." name="email" required><br><br>
            &nbsp;&nbsp;<input type="password" placeholder="Enter Password" name="password" required><br><br><br>
            <input type="submit" value="Submit" name="finish">
        </form>
</div>
</body>
</html>