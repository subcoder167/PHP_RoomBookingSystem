<?php

    session_start();
    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 0);

    $uCookie = $_SESSION['UserStudent'] . 'Pos';

    $checkedIn = json_decode($_COOKIE[$_SESSION['UserStudent']], true);

    $aRooms = json_decode($_COOKIE['RoomsArray'], true);
    $arrayPos = $_COOKIE[$uCookie];
    // echo $checkedIn[1];

    $timeStamp = $_COOKIE['CheckInTime'];

    if($_POST['CheckOut']) {
        setcookie($_SESSION['UserStudent'], "");
        setcookie('CheckInTime', "");
        $aRooms[$arrayPos][4] = "Available";
        setcookie('RoomsArray', json_encode($aRooms));
        
        header("location:student.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div>
        <div class="navbar" style="display:flex;justify-content:space-evenly;align-items:center">

            <a href="logout.php" id="nav_tag">LOG OUT</a>
            <?php
                echo("<h3 style='color:white'>You have checked in to the following room at $timeStamp</h3>");
            ?>
                </div>
        <div class="table_container">
            <table>
                <tr>
                    <th>#ID</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Charge</th>
                    <th>CheckOut</th>

                </tr>
                <tr>

                    <?php

                        for($i=0;$i<4;$i++) {

                            echo("<td>" . $checkedIn[$i] . "</td>");
                        
                        }
                        
                        echo("<td><form action='checkedIn.php' method='POST'><input type='submit' value='Check Out' name='CheckOut'></form></td>");

                    ?>

                </tr>
            </table>
        </div>
    </div>
</body>
</html>