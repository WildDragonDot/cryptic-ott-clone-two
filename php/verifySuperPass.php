<?php
session_start();
require_once('link.php');
    $data = array();
    if (isset($_POST['web_series_name']) && isset($_POST['video_uuid'])) {
        $web_series_name = mysqli_real_escape_string($con, $_POST['web_series_name']);
        $video_uuid = mysqli_real_escape_string($con, $_POST['video_uuid']);
        if ($web_series_name !== '') {
            array_push($_SESSION['superPass'], $web_series_name);
            array_push($_SESSION['superPassVideoUuid'], $video_uuid);  
            $cookie_name = "superPass";
            $cookie_value = $web_series_name;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day
            $cookie_name = "superPassVideoUuid";
            $cookie_value = $video_uuid;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day
            $data['status'] = 201;
            echo json_encode($data);
        }else{
            $data['status'] = 601;
            echo json_encode($data);
        }
            
    }
?>