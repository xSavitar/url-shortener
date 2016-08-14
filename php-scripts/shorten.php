<?php
	//Import the Database configurations
	include "db-connection.php";

	//Official Link to server
	$LINK = "localhost:3000";

	//make sure the post is parsed and data is gotten
	if(isset($_POST['link']) && !empty($_POST['link'])) {
		$link = $_POST['link'];
		$hash = substr(strtolower(preg_replace('/[0-9_\/]+/','', base64_encode(sha1($link)))),0,8);
		$server_link = $_SERVER['SERVER_NAME'];

		$short_link = $LINK . '/' . $hash;

		//$query = "INSERT INTO urls VALUES ('', '$has"

        echo json_encode(array("shortUrl"=>$short_link, "hash"=>$hash));
    }