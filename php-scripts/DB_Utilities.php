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
}