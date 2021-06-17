<?php 

    session_start();
    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 0);

    $rooms = json_decode($_COOKIE['RoomsArray'], true);

    if($_POST['delete']) {
        if (isset($_POST['DeleteRoom'])) {
            $dRoom = $_POST["DeleteRoom"];
            unset($rooms[$dRoom]);
            $rooms = array_values($rooms);
            setcookie('RoomsArray', json_encode($rooms));
            header("location:admin.php");
            exit;
        }
    }
?>
 
<html lang="en">
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div>
        <div class="navbar">

            <a href="room.php" id="nav_tag">INSERT</a>
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
                    <th>Delete</th> 
                </tr>
                <?php                     

                    for($i=0;$i<count($rooms);$i++){
                        echo("<tr>");
                        for($j=0;$j<count($rooms[$i]);$j++){
                            echo ("<td>" . $rooms[$i][$j] . "</td>");
                        }
                        echo("<td><form action='admin.php' method='POST' ><input type='checkbox' name='DeleteRoom' value=$i><input type='submit' value='Delete' name='delete'></form></td></tr>");
                    }                  

                ?>

            </table>
        </div>
    </div>
</body>
</html>