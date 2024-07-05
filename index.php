<!DOCTYPE html>
<html lang="en">

<head>
    <title>CYCLE BOOKING</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./cycle.css" />
    <script src="https://kit.fontawesome.com/3f8f2cb77a.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="nav">
        <div class="topnav">
            <img id="logo" src="./images/iithlogo.png" alt="LOGO IITH">
            <p>IIT-Hyderabad</p>
            <div class="rightside">
                <a href="./S-signin.php">Logout</a>
                <?php 
                    if(isset($_GET['username']) && isset($_GET['email'])){
                        $username = $_GET['username'];
                        $email = $_GET['email'];
                        // echo "Hi ". htmlspecialchars($username);
                        echo "<a href='#'>Hi ".htmlspecialchars($username)."</a>";
                    }
                    else{
                        echo "<a href='./S-signin.php'>Sign in</a>";
                    }
                ?>
                <?php 
                    if(isset($_GET['username']) && isset($_GET['email'])){
                        $username = $_GET['username'];
                        $email = $_GET['email'];
                        echo "<a href='./profile.php?username=$username'>Profile</a>";
                    }
                    
                ?>
                <a href="#">About</a>
                <?php 
                        if(isset($_GET['username']) && isset($_GET['email'])){
                            $str = "<a href='./S-book.php?username=". urlencode($username)."&email=" . urlencode($email) . "'>Book Now</a>";
                            echo "$str";
                            // echo "<a href='./book.html'>Book Now</a>";
                        }
                        else{
                            echo "<a href='./S-signin.php'>Book Now</a>";
                        }
                    ?>
                <!-- <a href="./book.html">Book Now</a> -->
                <a href="#">Home</a>
            </div>
        </div>
    </div>
    <div class="image">
        <img id="img" src="./images/img.png" alt="Cycles">
    </div>
    <div class="box" id="button">
        <!-- <a href="./book.html">Book Now</a> -->
        <?php 
            if(isset($_GET['username']) && isset($_GET['email'])){
                // echo "<a href='./book.html?username='>Book Now</a>";
                    $str = "<a href='./S-book.php?username=".urlencode($username)."&email=" . urlencode($email) . "'>Book Now</a>";
                echo "$str";
            }
            else{
                echo "<a href='./S-signin.php'>Book Now</a>";
            }
        ?>
    </div>
    <div class="socialmedia">
        <p>Follow us on Social Media</p>
        <div id="icons">
        <a href="https://www.instagram.com/iithyderabad/"><i class="fab fa-instagram fa-2x"></i></a>
        <a href="https://www.facebook.com/iithyderabad/"><i class="fab fa-facebook fa-2x"></i></a>
        <a href="https://twitter.com/IITHyderabad/"><i class="fab fa-twitter fa-2x"></i></a>
        <a href="https://www.linkedin.com/school/iithyderabad/?originalSubdomain=in"><i class="fab fa-linkedin fa-2x"></i></a>
        </div>
    </div>
</body>
<footer>
    <div class="copyrights">
        <p>&copy; 2023 Copyright: CYCLES IIT-HYDERABAD</p>
    </div>
</footer>
</html>