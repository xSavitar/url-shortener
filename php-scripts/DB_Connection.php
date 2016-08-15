<?php

/**
* Database class for connection to the database
*/
class DB_Connection
{
	/**
	 * @var $host
	 */
	private $host;

	/**
	 * @var $username
	 */
	private $username;

	/**
	 * @var $password
	 */
	private $password;

	/**
	 * @var $database
	 */
	private $database;

	/**
	 * __construct()
	 */
	function __construct( $host = null, $username = null, $password = null )
	{
		if( null == $host && null == $username && null == $password ) {
			$this->host = "localhost";
			$this->username = "root";
			$this->password = "root";
			$this->database = "url_shortener";
		} else {
		$this->host = "tools.labsdb";
		$this->username = "s53107";
		$this->password = "T64XAOjRnDwziUN5";
		$this->database = "url_shortener";
		}
	}

	/**
	 * @var $host, $username, $password
	 * @return Connection $conn_handler
	 */
	public function db_connection()
	{
		$conn_handler = mysql_connect( $this->host, $this->username, $this->password );

		return $conn_handler;
	}

	/**
	 * @var $database, $conn_handler
	 * @return Seleted $database database
	 */
	public function db_select( $conn_handler )
	{
		if ( !$conn_handler ) {
			die( "Unable to connect to database " . mysql_error() );
		}

		$database = mysql_select_db( $this->database, $conn_handler );

		return $database;
	}

	/**
	 * Destructor function
	 */
	function __destruct()
	{
		
	}
}
