<?php
	// Local configurations
	/*$HOST = "localhost";
	$USER = "root";
	$PASS = "root";
	$DATABASE = "url_shortener";*/

	// Tool Labs configurations
	$HOST = "10.68.23.58";
	$USER = "s53107";
	$PASS = "root";
	$DATABASE = "T64XAOjRnDwziUN5";

	$conn = mysql_connect($HOST, $USER, $PASS);

	if (!$conn) {
		die("Error Connecting to DB" . mysql_error());
	}

	$res = mysql_select_db($DATABASE);

	if (!$res) {
		die("Error using database". mysql_error());
	}
