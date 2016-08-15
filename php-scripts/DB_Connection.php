<?php

/**
* Database class for connection to the database
*/
class DB_Connection
{
	/**
	 * @var $host
	 */
	public $host;

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

			return ;
		} 

		$this->host = "tools.labsdb";
		$this->username = "s53107";
		$this->password = "T64XAOjRnDwziUN5";
		$this->database = "url_shortener";
	}

	/**
	 * @var $host, $username, $password
	 * @return Connection $conn_handler
	 */
	public function db_connection()
	{
		$db_utilities = new DB_Utilities();

		$conn_handler = $db_utilities->db_connect( $this->host, $this->username, $this->password );

		return $conn_handler;
	}

	/**
	 * @var $database, $conn_handler
	 * @return Seleted $database database
	 */
	public function db_select( $conn_handler )
	{
		$db_utilities = new DB_Utilities();

		if ( !$conn_handler ) {
			die( "Unable to connect to database " . $db_utilities->error() );
		}

		$database = $db_utilities->db_select( $this->database, $conn_handler );

		return $database;
	}

	/**
	 * Destructor function
	 */
	function __destruct()
	{
		
	}
}
