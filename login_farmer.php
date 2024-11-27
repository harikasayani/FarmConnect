<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Login</title>
    <link rel="stylesheet" href="login_farmers.css">
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
                $phone=$_POST["phone"];
                $pswd=$_POST["password"];
                $sql="select * from farmer_register where phone='$phone' and password='$pswd' ";
                $res=mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)==1){
                    header("Location:farmer_dashboard.php");
                }
                else{
                    echo "<script>alert('Enter correct Phone number or Password');</script>";
                }
            }
        ?>
        <form action="login_farmer.php" method="post" class="form-container" name="farmer">
            <h1 style="color:green;">Login</h1>
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="tel" placeholder="Phone Number" name="phone" required>
            &nbsp;&nbsp;<input type="password" placeholder="Enter Password" name="password" required><br><br>
            <input type="submit" value="Submit" name="finish">
        </form>
</div>
</body>
</html>