<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "Cycles") ;
        if(!$conn){
            die("Connection failed" .mysqli_connect_error());
        }
        echo "connected successfully<br>";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $password = $_REQUEST["psw"];
            $username = $_REQUEST["uname"];
            $sql = "SELECT email FROM users WHERE username='$username' AND password='$password'";
            if($res = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($res)==1){
                    $row = mysqli_fetch_assoc($res);
                    $email = $row['email'];
                    header("Location: index.php?username=" . urlencode($username) . "&email=" . urlencode($email));
                    exit();
                }
                else{
                    header("Location: S-signin.php?error=user-notexists");
                    echo "sign up first";
                    exit();
                }
            }
            else{
                echo "error";
            }
        }

    ?>



</body>
</html>