<?php
/**
* PHP + MySQL functions that have been redefined
*/
class DB_Utilities extends DB_Connection {
	// Query DB
	public function db_query( $con, $query ) {
		$results = mysqli_query( $con, $query );

		return $results;
	}

	// Fetch record from DB
	public function db_fetch_row( $results ) {
		$output = mysqli_fetch_row( $results );

		return $output;
	}

	// Show query errors
	public function db_error( $con ) {
		return mysqli_error( $con );
	}

	// Connect to DB
	public function db_connect( $host, $username, $password, $database ) {
		$con = mysqli_connect( $host, $username, $password, $database );

		return $con;
	}

	// Select DB
	public function db_select( $con, $database ) {
		$db = mysqli_select_db( $con, $database );

		return $db;
	}
	
	// Fetch number of records from DB
	public function db_num_rows( $results ) {
		$output = mysqli_num_rows( $results );

		return $output;
	}
}
