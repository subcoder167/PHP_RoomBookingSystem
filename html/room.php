<?php 

    session_start();
    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 0);
    // $tRooms = array(array());
    $tRooms = array();

    if(isset($_POST['Submit'])) {

        $rID = $_POST["rID"];
        $rType = $_POST["rType"];
        $rLoc = $_POST["rLocation"];
        $rChrg = $_POST["rCharge"];
        $rStat = $_POST["rStatus"];

        $nRoom = array($rID, $rType, $rLoc, $rChrg, $rStat);

        if(isset($_COOKIE['RoomsArray'])){
            $OldRooms = json_decode($_COOKIE["RoomsArray"], true);
            array_push($OldRooms, $nRoom);
            setcookie('RoomsArray', json_encode($OldRooms));
        } else{
            array_push($tRooms, $nRoom);
            setcookie('RoomsArray', json_encode($tRooms));
        }

        header("location:admin.php");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create room</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="room_container">
        <h2>Create a room</h2>
        <div class="create_room">
            <form action="room.php" method="POST">
                <input type="number" placeholder="Room ID" name="rID" class="input_style" required><br>
                <input type="text" placeholder="Room Type" name="rType" class="input_style" required><br>
                <input type="text" placeholder="Room Location" name="rLocation" class="input_style" required><br>
                <input type="text" placeholder="Room Charge" name="rCharge" class="input_style" required><br>
                <label for="rStatus">Choose current status of room:</label>
                <select name="rStatus">
                    <option value="Available">Empty</option>
                    <option value="Occupied">Occupied</option>
                </select>
                <input type="submit" class="rBtn" name="Submit" value="Create Room">
            </form>
        </div>
    </div>
</body>
</html>