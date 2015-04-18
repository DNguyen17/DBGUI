<?php //completely written by 
    require 'vendor/autoload.php';
    $app = new \Slim\Slim();
    $server = "localhost";
    $user = "root";
    $pass = "rootpass";
    $dbname = "stablestudy";
    $mysqli = new mysqli($server, $user, $pass, $dbname);
    if ($mysqli->connect_error)
        die("Connection failed: " . $mysqli->connect_error);
    
    
    $app->post('/loginUser', function(){
        session_start();
        global $mysqli;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = $mysqli->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
        
        
        
        $row = $result->fetch_assoc();
        if(($row === NULL)) {
            $jsonArray = array(
                'status' => 'Failure',
                'fName'=> NULL,
                'lName'=> NULL,
                'school'=> NULL,
                'username'=> NULL);
            echo json_encode($jsonArray);
            return;

        }
        
        
        else {
            $jsonArray = array(
                'status' => 'Success',
                'fName'=> $row['fName'],
                'lName'=> $row['lName'],
                'school'=> $row['school'],
                'username'=> $row['username']);
            
            echo json_encode($jsonArray);
            return;
        }
        
        
    });
    
    $app->post('/user', function(){
    
        session_start();
        global $mysqli;
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $school = $_POST['school'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $doesUserExist = $mysqli->query("SELECT * FROM users WHERE username = '$username'");
        $doesEmailExist = $mysqli->query("SELECT * FROM users WHERE email = '$email'");
        
        //if username or email exists
        if($doesUserExist === NULL || $doesEmailExist === NULL)
        {
            $jsonArray = array( 'u_id' => -1);
            echo json_encode($jsonArray);
            return;
        }
        
        //else add in new user
        else
        {
            
            if($mysqli->query("INSERT INTO users(fName, lName, school, username, email, password) VALUES ('$fName', '$lName', '$school', '$username', '$email', '$password')")){
            }
            else {
                echo "db done goofed ";
            }
            $jsonArray = array('u_id' => 1);
            
            echo json_encode($jsonArray);
            return;
        }
        
        //return error
        $jsonArray = array('u_id' => -2);
        echo json_encode($jsonArray);
        return;
        
    });
    
    $app->get('/locations', function(){
        global $mysqli;
        $locationList = $mysqli->query("SELECT * FROM locations");
        echo json_encode($locationList->fetch_all(MYSQLI_ASSOC)); 
        return;
        
    });

    $app->get('/buildings', function(){
        global $mysqli;
        $buildingList = $mysqli->query("SELECT DISTINCT buildingName FROM locations");

        echo json_encode($buildingList->fetch_all(MYSQLI_ASSOC));




        return;
        
    });

    $app->get('/locinfo', function(){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM locations");
        $locationList = $result->fetch_all(MYSQLI_ASSOC);
        $len = count($locationList);
        $all_loc = array();
        for ($i = 0; $i < $len; $i++){
            $json = array(
                'capacity' => $locationList[$i]['chairs'],
                'name' => $locationList[$i]['buildingName']." ".$locationList[$i]['roomNumber'],
                'external_id' => NULL,
                'external_info' => NULL,
                'available_hours' => NULL,
                'manager' => "",
                'last_modified' => NULL,
                'etag' => NULL,
                'type' => "classroom",
                'images' => NULL,
                'organization' => "",
                'display_access_restrictions' => 'false',
                'id' => $locationList[$i]['id'],
                'location' =>
                    array(
                    'floor' => $locationList[$i]['floor'],
                    'height_from_sea_level' => NULL,
                    'longitude' => $locationList[$i]['longitude'],
                    'latitude' => $locationList[$i]['latitude'],
                    'building_name' => $locationList[$i]['buildingName']
                    )

                );
            $all_loc[$i] = $json;
        }
        echo json_encode($all_loc);
        return;

    });

    $app->post('/addLocation', function(){
       global $mysqli;
        $buildingName = $_POST['buildingName'];
        $roomNumber = $_POST['roomNumber'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
        $classroom = $_POST['classroom'];
        $outdoor = $_POST['outdoor'];
        $open_space = $_POST['open_space'];
        $study_room = $_POST['study_room'];
        $floor = $_POST['floor'];
        $chairs = $_POST['chairs'];
        $computers = $_POST['computers'];
        $whiteboards = $_POST['printers'];
        $projectors = $_POST['projectors'];
        $printers = $_POST['printers'];
        $restricted = $_POST['restricted'];
        $pictureurl = $_POST['pictureurl'];

        $existingRoom = $mysqli->query("SELECT * FROM locations WHERE buildingName = '$buildingName' AND roomNumber = '$roomNumber'");
        if($existingRoom->fetch_assoc() === NULL){
            echo json_encode(array('status'=>'failed', 'problem'=>1));
            return;
        }
        else{
            $mysqli->query("INSERT INTO locations(latitude, longitude, floor, buildingName, roomNumber, classroom, outdoor, open_space, study_room, chairs, computers, whiteboards, printers, projectors, restricted, pictureurl)
                            VALUES('$latitude', '$longitude', '$floor', '$buildingName', '$roomNumber', '$classroom', '$outdoor', '$open_space', '$study_room', '$chairs', '$computers', '$whiteboards', '$printers', '$projectors', '$restricted', '$pictureurl')");
            echo json_encode(array('status'=>'success', 'problem'=>0));
            return;
        }

    });
/*
 * problem id => 0 : no problems
 * problem id => 1 : room not in DB
 * problem id => 2 : host has another meeting at this time
 * problem id => 3 : room has another meeting at this time
 * problem id => 4 : other user doesn't exist in DB
 */
    $app->post('/createMeeting', function(){
        global $mysqli;
        $hostName = $_POST['hostName'];
        $buildingName = $_POST['buildingName'];
        $roomNumber = $_POST['roomNumber'];
        $meetingTime = $_POST['meetingTime'];
        $otherUsers = $_POST['users'];

        //get location id
        $getRoomID = $mysqli->query("SELECT id FROM locations WHERE buildingName= '$buildingName' AND roomNumber= '$roomNumber'");
        $roomArr = $getRoomID->fetch_assoc();

        if ($roomArr === NULL){

            echo json_encode(array('status' => 'failed', 'problem' => 1));
            return;
        }
        else {
            $roomID = $roomArr['id'];
        }

        //personal scheduling conflict
        $existingMeet = $mysqli->query("SELECT * FROM meetings WHERE hostName = '$hostName' AND meetingTime = '$meetingTime'");
        if ($existingMeet->fetch_assoc() != NULL){
            echo json_encode(array('status' => 'failed', 'problem' => 2));
            return;
        }
        //room scheduling conflict
        $existingMeet = $mysqli->query("SELECT * FROM meetings WHERE roomID = '$roomID' AND meetingTime = '$meetingTime'");
        if ($existingMeet->fetch_assoc() != NULL){
            echo json_encode(array('status' => 'failed', 'problem' => 3));
            return;
        }

        if($mysqli->query("INSERT INTO meetings(hostName, meetingTime, roomID) VALUES('$hostName', '$meetingTime', '$roomID')")){

        }
        else{
            echo 'db done goofed';
        }

        $getMeetingID = $mysqli->query("SELECT meetingID FROM meetings WHERE hostName = '$hostName' AND roomID = '$roomID'");
        $meetingIDarr = $getMeetingID->fetch_assoc();
        $meetingID = $meetingIDarr['meetingID'];

        $len = count($otherUsers);

        for ($i = 0; $i < $len; $i++){
            $username = $otherUsers[$i];
            if($mysqli->query("INSERT INTO meetingUsers(meeting_id, users) VALUES('$meetingID', '$username')")){
            }
            else{
                // other user might not exist in database
                echo json_encode(array('status'=>'failed', 'problem' => 4));
                return;
            }
        }

        echo json_encode(array('status'=>'success', 'problem' => 0));
        return;

    });

    $app->post('/getMeetings', function(){
        global $mysqli;
        $hostName = $_POST['hostName'];
        $meeting_list = $mysqli->query("SELECT meetingTime, roomID, users FROM meeting INNER JOIN meetingUsers ON meeting.meetingID = meetingUsers.meeting_id WHERE hostName = '$hostName'");
        $result = $meeting_list->fetch_all(MYSQLI_ASSOC);
        echo json_encode($result);
        return;
    });

    $app->post('/addFavorite', function(){
        global $mysqli;
        $username = $_POST['username'];
        $buildingName = $_POST['buildingName'];
        $roomNumber = $_POST['roomNumber'];

        $getID = $mysqli->query("SELECT id FROM locations WHERE buildingName = '$buildingName' AND roomNumber = '$roomNumber'");
        $roomID = $getID->fetch_assoc();

        // room doesn't exist
        if($roomID === NULL){
            echo json_encode(array('status'=>'failed'));
            return;
        }
        else{

            $checkExisting = $mysqli->query("SELECT * FROM favorites WHERE username = '$username' AND roomID = '$roomID'");
            // if user already has that room as favorite
            if ($checkExisting->fetch_assoc() === NULL){
                echo json_encode(array('status'=>'failed'));
                return;
            }

            $mysqli->query("INSERT INTO favorites(username, favRoom) VALUES('$username', '$roomID')");
            echo json_encode(array('status'=>'success'));
            return;
        }
    });

    $app->post('/seeFavorites', function(){
        global $mysqli;
        $username = $_POST['username'];
        $favorite_arr = $mysqli->query("SELECT latitude, longitude, floor, buildingName, roomNumber, chairs, computers, whiteboards, printers, projectors, restricted, pictureurl
            FROM favorites INNER JOIN locations on favorites.favRoom = locations.id WHERE username = '$username'");
        $faves = $favorite_arr->fetch_all(MYSQLI_ASSOC);
        echo json_encode($faves);
        return;

    });
    
    $app->run();
?>
