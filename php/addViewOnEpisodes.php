<?php
session_start();
require_once 'link.php';

if(isset($_POST['add_video_uuid'])){
    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
     $date_now = date('D, d M Y h:i:sa');

    $add_video_uuid = mysqli_real_escape_string($con, $_POST['add_video_uuid']);
    $add_module_uuid = mysqli_real_escape_string($con, $_POST['add_module_uuid']);

    $result = mysqli_query($con, "SELECT `video_view` FROM `web-series-episodes-info` WHERE `video_uuid` = '$add_video_uuid' AND `module_uuid` = '$add_module_uuid'");    
    if (mysqli_num_rows($result) > 0 ) {
        $id = 0;
        while ($row = mysqli_fetch_array($result)) {
                    $id = $row['video_view'];  
                }
                $id = $id + 1;
        $query = "UPDATE `web-series-episodes-info` SET `video_view` = '$id' WHERE `video_uuid` = '$add_video_uuid' AND `module_uuid` = '$add_module_uuid'";

        if($result1 = mysqli_query($con, $query)) {
            $data['views'] = $id;
            $data['status'] = 201;
            echo json_encode($data); 
        }else{  
            $data['status'] = 601;
            echo json_encode($data);
        }        
    }else{ 
        $data['status'] = 501;
        $data['err'] = 'View not added..';
        echo json_encode($data); 
    }
}
?>