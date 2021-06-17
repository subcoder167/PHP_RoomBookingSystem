<?php

    session_start();

    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 0);

    date_default_timezone_set('Asia/Kolkata');
    $date = date('H:i d/m/Y ', time());

    $sRooms = json_decode($_COOKIE['RoomsArray'], true);

    $uCookie = $_SESSION['UserStudent'] . 'Pos';
    
    
    $loggedUser = $_SESSION['UserStudent'];

    if(isset($_COOKIE[$loggedUser])){
        if(!empty($_SESSION['UserStudent'])){
            header("location:checkedIn.php");
        }
    }

    if($_POST['CheckIn']) {
        if (isset($_POST['Checkin'])) {
            $checkIn = $_POST["Checkin"];
            setcookie($uCookie, $checkIn);
            $checkedIn = $sRooms[$checkIn];
            // $usercookie = $_SESSION['UserStudent'];
            // $checkedIn = json_decode($_COOKIE[$usercookie], true);
            setcookie($_SESSION['UserStudent'], json_encode($checkedIn));
            setcookie('CheckInTime', $date);
            $sRooms[$checkIn][4] = "Occupied";
            setcookie('RoomsArray', json_encode($sRooms));
            header("location:checkedIn.php");
            exit;
        }
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
        <div class="navbar">
            <a href="logout.php" id="nav_tag">LOG OUT</a>
        </div>
        <div class="table_container">
            <table>
                <tr>
                    <th>#ID</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Charge</th>
                    <th>Room Status</th>
                    <th>CheckIn</th>

                </tr>
                <tr>

                    <?php

                        $a = 0;

                        for($i=0;$i<count($sRooms);$i++) {
                            echo("<tr>");
                            if($sRooms[$i][4] == "Available") {
                                $a +=1; 
                                for($j=0;$j<4;$j++) {
                                    echo("<td>" . $sRooms[$i][$j] . "</td>");
                                }                                
                                echo("<td><form action='student.php' method='POST'><input type='checkbox' name='Checkin' value=$i></td><td><input type='submit' value='Check In' name='CheckIn'></td></form>");
                            }
                            

                            
                            echo("</tr>");
                        }
                        
                    ?>

                </tr>
            </table>
        </div>
    </div>
</body>
</html>