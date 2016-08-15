<?php
	// Local configurations
	/*$HOST = "localhost";
	$USER = "root";
	$PASS = "root";
	$DATABASE = "url_shortener";*/

	// Tool Labs configurations
	$HOST = "tools.labsdb";
	$USER = "s53107";
	$PASS = "T64XAOjRnDwziUN5";
	$DATABASE = "s53107__url_shortener";

	$conn = mysql_connect($HOST, $USER, $PASS);

	if (!$conn) {
		die("Error Connecting to DB " . mysql_error());
	}

	$res = mysql_select_db($DATABASE);

	if (!$res) {
		die("Error using database ". mysql_error());
	}
