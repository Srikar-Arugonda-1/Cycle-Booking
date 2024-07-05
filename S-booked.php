<!DOCTYPE html>
<html>

<head>
    <title>BOOKED</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./booked.css" />
    <script>
        function openFile(url) {
            window.location.href = url;
        }
    </script>
</head>

<body>
    <?php
        $name = $_GET["name"];
        $email = $_GET["email"];
        $pickup = $_GET["pickup"];
        $dest = $_GET["dest"];
        $cycle = $_GET['cycleno'];
        $ptime = $_GET['ptime'];
        $id = $_GET['id'];
    ?>
    <div class="background"> </div>
    <div class="box">
        <form action="/action_page.php" method="post">
            <h1>Book your trip</h1>
            <hr>
            <div class="container">
                <div class="contain">
                    <!-- <label for="name"><b>Name</b></label>
                    <input type="text" id="name" placeholder="Name" name="name" required>
                    <label for="psw"><b>Roll No</b></label>
                    <input type="text" id="psw" placeholder="Roll No" name="psw" required> -->
                    <div class="formcolumn side">
                        <label for="fromplace">From :</label>
                        <input type="text" id="fromplace" class="disabled" name="name" value=<?php echo "$pickup"; ?> readonly>
                    </div>
                    <span class="arrow">&#8644;</span>
                    <!-- <span class="arrow">&#8594;&raquo;</span> -->
                    <div class="formcolumn side">
                        <label for="toplace">To :</label>
                        <input type="text" id="toplace" class="disabled" name="name" value=<?php echo "$dest"; ?>  readonly>
                    </div>
                    <div class="formcolumn">
                        <label for="starttime"><b>Start time</b></label>
                        <input type="time" id="starttime" class="highlight" name="starttime" value=<?php echo "$ptime"; ?>  readonly>
                    </div>
                </div>
            </div>
            <button class="disabled-button">Book Now</button>
        </form>
        <div class="confirm">
        <?php 
                echo "<p>Your cycle has been booked. Cycle no :- $cycle </p>";
            ?>
            <!-- <button onclick="openFile('./book.php')">Cancel</button> -->
            <?php 
                $cancel = "./S-book.php?op=cancelled&pickup=" . urlencode($pickup) . "&cycleno=" . urlencode($cycle) . "&username=" . urlencode($name) . "&email=" . urlencode($email) . "&id=" . urlencode($id);
                // echo "<button onclick='openFile($s)'>Cancel</button>";
                $park = "./S-book.php?op=parked&dest=" . urlencode($dest)."&cycleno=".urlencode($cycle) . "&id=" . urlencode($id) . "&username=" . urlencode($name) . "&email=" . urlencode($email) ;

        ?>
        </div>
        <div class="proceed">
            
            <a href = <?php echo"$cancel"?> >
                <button>Cancel</button>
            </a>
            <a href = <?php echo"$park";?>>
                <button>Park</button>
            </a> 
        </div>
    </div>
</body>

</html>