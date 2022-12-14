<?php
session_start();
require_once('link.php');
    $data = array();
    if (isset($_POST['user_address'])) {
        $user_address = mysqli_real_escape_string($con, $_POST['user_address']);
        if ($user_address !== '') {
            $_SESSION['accessPass'] = "verified_access_pass";
            $data['status'] = 201;
            echo json_encode($data);
        }else{
            $data['status'] = 601;
            echo json_encode($data);
        }
            
    }
?>