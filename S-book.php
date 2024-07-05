<!DOCTYPE html>
<html>

<head>
    <title>BOOK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./book.css" />

</head>

<body>
    <?php
        if(isset($_GET['username']) && isset($_GET['email'])){
            $username = $_GET['username'];
            $email = $_GET['email'];
            $str =  "./form.php?name=" . urlencode($username) . "&email=". urlencode($email);
        }
        
    ?>
    <div class="background"> </div>
    <div class="box">
        <form action=<?php echo "$str" ?> method="post" onsubmit="return validateForm()">
            <h1>Book your trip</h1>
            <hr>
            <div class="container">
                <!-- <label for="name"><b>Name</b></label>
                <input type="text" id="name" placeholder="Name" name="name" required>
                <label for="psw"><b>Roll No</b></label>
                <input type="text" id="psw" placeholder="Roll No" name="psw" required> -->
                <div class="formcolumn side">
                    <label for="fromplace">From:</label>
                    <select id="fromplace" class="highlight" name="pickup" onchange="updateToOptions()" required>
                        <option value="">Select</option>
                        <option value="Newhostel">NEW HOSTELS</option>
                        <option value="Oldhostel">OLD HOSTELS</option>
                        <option value="Maingate">MAIN GATE</option>
                        <option value="Isthara">ISTHARA FOOD COURT</option>
                    </select>
                </div>
                <span class="arrow">&#8644;</span>
                <div class="formcolumn side">
                    <label for="toplace">To:</label>
                    <select id="toplace" class="highlight" name="dest" required>
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="formcolumn">
                    <label for="starttime"><b>Start time</b></label>
                    <input type="time" id="starttime" class="highlight" name="starttime" required>
                    <span id="timeError" style="display: none; color:red; text-align:center;"><p>Please enter a valid time.</p></span>
                </div>
                <button type="submit">Book Now</button>
            </div>
            <!-- <button onclick="openFile('./booked.html')">Cancel</button> -->
        </form>
        <?php
            if(isset($_GET['op']) && $_GET['op'] === 'cancelled'){
                $conn = mysqli_connect("localhost", "root", "", "Cycles") ;
                if(!$conn){
                    die("Connection failed" .mysqli_connect_error());
                }
                // echo "connected successfully<br>";
                $cycleno = $_GET['cycleno'];
                $pickup = $_GET['pickup'];
                $id = $_GET['id'];
                // echo "$id";
                $sql = "INSERT INTO $pickup VALUES ('$cycleno')";
                if(mysqli_query($conn, $sql)){
                    // echo "booking cancelled";
                }
                $cancel = "cancelled";
                $sql_status = "UPDATE running SET status = 'cancelled'  WHERE id= $id";
                if(mysqli_query($conn, $sql_status)){
                    // echo "status updated";
                }
            }
            if(isset($_GET['op']) && $_GET['op'] === 'parked'){
                $conn = mysqli_connect("localhost", "root", "", "Cycles") ;
                if(!$conn){
                    die("Connection failed" .mysqli_connect_error());
                }
                // echo "connected successfully<br>";
                $dest = $_GET['dest'];
                $cycleno = $_GET['cycleno']; 
                $id = $_GET['id'];
                $sql = "INSERT INTO $dest VALUES ('$cycleno')";
                if(mysqli_query($conn, $sql)){
                    echo "<p>Cycle is parked</p>";
                }
                $sql_status = "UPDATE running SET status = 'parked' WHERE id= $id";
                if(mysqli_query($conn, $sql_status)){
                    // echo "status updated";
                }
            }
        ?>
    </div>
    <script>
        function updateToOptions() {
            var fromSelect = document.getElementById("fromplace");
            var toSelect = document.getElementById("toplace");
            var selectedToValue = toSelect.value;

            toSelect.innerHTML = "";
            var selectOption = document.createElement("option");
            selectOption.value = "";
            selectOption.text = "Select";
            toSelect.appendChild(selectOption);
            var selectedFromValue = fromSelect.value;
            for (var i = 0; i < fromSelect.options.length; i++) {
                var option = fromSelect.options[i];
                if (option.value !== selectedFromValue && option.value !== "") {
                    var clonedOption = option.cloneNode(true);
                    toSelect.appendChild(clonedOption);
                    if (clonedOption.value === selectedToValue) {
                        clonedOption.selected = true;
                    }
                }
            }
        }

        updateToOptions();

        var arrow = document.querySelector('.arrow');
        arrow.addEventListener('click', function () {
            var fromInput = document.getElementById('fromplace');
            var toInput = document.getElementById('toplace');
            var temp = fromInput.value;
            fromInput.value = toInput.value;
            toInput.value = temp;
            updateToOptions();
        });

        function validateForm() {
            var startTimeInput = document.getElementById("starttime");
            var selectedTime = startTimeInput.value;
            var selectedTimeParts = selectedTime.split(":");
            var selectedHours = parseInt(selectedTimeParts[0]);
            var selectedMinutes = parseInt(selectedTimeParts[1]);

            var currentTime = new Date();
            var currentHours = currentTime.getHours();
            var currentMinutes = currentTime.getMinutes();

            if (selectedHours < currentHours || (selectedHours === currentHours && selectedMinutes <= currentMinutes)) {
                var timeError = document.getElementById("timeError");
                timeError.style.display = "inline";
                return false;
            }

            return true;
        }

        var startTimeInput = document.getElementById("starttime");
        startTimeInput.addEventListener("blur", function () {
            var timeError = document.getElementById("timeError");
            timeError.style.display = "none";
        });
    </script>
</body>

</html>