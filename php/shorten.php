<?php
	//Import the Database configurations
	include( "DB_Connection.php" );
	include( "DB_Utilities.php" );

	// official Link on tool labs server to php scripts
	$LABS_SCRIPT = "tools.wmflabs.org/durl-shortener/php/shorten.php";

	// official link on tool labs to server
	$LABS_HOST = "tools.wmflabs.org/durl-shortener/shortener.php";

	// official Link on localhost server
	$LOCAL_SCRIPT = "localhost:3000/php/shorten.php";

	// official Link on localhost server to php scripts
	$LOCAL_HOST = "localhost:3000/shortener.php";

	// get the current link when visited
	$request_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	// eliminate all unecessary characters from the link like additional space
	$request_link = htmlspecialchars( trim( $request_link ) );
	
	if ( $LABS_SCRIPT === $request_link ) {

		$database_obj = new DB_Connection( "host", "username", "password", "database" );

	} else if ( $LOCAL_SCRIPT === $request_link ) {

		$database_obj = new DB_Connection( null, null, null, null );

	} else {
		// do nothing
	}

	// make sure the post is parsed and data is gotten
	if ( isset( $_POST['link'] ) && !empty( $_POST['link'] ) ) {
		$long_link = $_POST['link'];
		
		// check if long_link already exist in the datadase
		$search = "SELECT * FROM urls WHERE long_url = '$long_link'";
		
		$con = $database_obj->db_connection();
			
		$db_utilities = new DB_Utilities();

		$res = $db_utilities->db_query( $con, $search );

		if ( !$res ) {
		
			die( "Error running query" . $db_utilities->db_error( $con ) );
			
		}
		
		if ( $db_utilities->db_num_rows( $res ) > 0 ) {
			
			$results = $db_utilities->db_fetch_row( $res );
			
		    echo json_encode( array( "shortUrl"=> $results[1] ) );
		    
		} else {
		
			$hash = substr( strtolower( preg_replace( '/[0-9_\/]+/','', base64_encode( sha1( $long_link ) ) ) ), 0, 8 );

			if ( $LABS_SCRIPT === $request_link ) {

				$short_link = $LABS_HOST . '/' . $hash;


			} else if ( $LOCAL_SCRIPT === $request_link ) {

				$short_link = $LOCAL_HOST . '/' . $hash;

			} else {
				// do nothing
			}

			$query = "INSERT INTO urls(short_url, long_url) VALUES ('$short_link', '$long_link');";

			$res = $db_utilities->db_query( $con, $query );

			if ( !$res ) {
				die( "Error running query" . $db_utilities->db_error( $con ) );
			}

		    echo json_encode( array( "shortUrl" => $short_link, "hash" => $hash ) );
    	}
    }
