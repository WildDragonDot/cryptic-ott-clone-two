<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
if(!empty($_POST['name']) && !empty($_POST['video_desc']) && !empty($_POST['thumbnail_ipfs']) && !empty($_POST['video_uid']) && !empty($_POST['category'])) {
	// $link= new mysqli("localhost","finflix","finflix","finflix");
	$link= new mysqli("localhost","root","","crypto-db");
	if($link->connect_error){
		die("connection Failed" .$link->connect_error);
	}
	$data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date('D, d M Y h:i:sa');
	function guidv4($data)
    {
        assert(strlen($data) == 16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    $video_uuid = guidv4(openssl_random_pseudo_bytes(16));
	$name = mysqli_real_escape_string($link, $_POST['name']);
	$categoryId = mysqli_real_escape_string($link, $_POST['category']);
	$video_desc = mysqli_real_escape_string($link, $_POST['video_desc']);
	$thumbnail_ipfs = mysqli_real_escape_string($link, $_POST['thumbnail_ipfs']);
	$video_id = mysqli_real_escape_string($link, $_POST['video_uid']);
	$categoryName = '';
	if($categoryId == 'f9c5310f-f75f-4217-a0d9-af3891c40531'){
		$categoryName='Music';
	}else if($categoryId == 'd8b06f66-bf4f-4244-822f-4378b0f0c9a4'){
		$categoryName='Teasers';
	}else if($categoryId == 'b48f9720-f5f9-434f-9b73-8693a9c0dc34'){
		$categoryName='Metaverse';
	}else{
		$categoryName = '';
	}
	
	$query = "INSERT INTO `video_info`(`video_uuid`, `name`, `video_desc`, `thumbnail_ipfs`, `video_uid`,`module_uuid`,`module`, `from_time`, `from_browser`, `from_ip`) VALUES ('$video_uuid','$name','$video_desc','$thumbnail_ipfs','$video_id','$categoryId','$categoryName','$date_now','$from_browser','$from_ip')";
	if($result1 = mysqli_query($link, $query)) { 
		$data['status'] = 201;
		$data['message']= 'Insert Data Successfully';
		echo json_encode($data);
		mysqli_close($link);

	}else{  
		$data['status'] = 601;
		$data['message']= 'somthing went wrong';
		echo json_encode($data);
	} 
}else{
	$data['status'] = 404;
	$data['message']= 'somthing went wrong';
	echo json_encode($data);
	}
?>