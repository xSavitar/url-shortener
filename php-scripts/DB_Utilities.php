<?php
/**
* PHP + MySQL functions that have been redefined
*/
class DB_Utilities extends DB_Connection
{
	// Query DB
	public function db_query( $query )
	{
		$results = mysql_query( $query );

		return $results;
	}

	// Fetch record from DB
	public function db_fetch_row( $results )
	{
		$output = mysql_fetch_row( $results );

		return $output;
	}

	// Show query errors
	public function error()
	{
		return mysql_error();
	}

	// Connect to DB
	public function db_connect($host, $username, $password){
		$conn = mysql_connect($host, $username, $password);

		return $conn;
	}

	// Select DB
	public function db_select($database, $conn){
		$db = mysql_select_db($database, $conn);

		return $db;
	}
	
	// Fetch number of records from DB
	public function db_num_rows( $results )
	{
		$output = mysql_num_rows( $results );

		return $output;
	}
}
