<?php

require __DIR__ . '/../vendor/autoload.php';

/**
* Database class for connection to the database
*/
class DB_Connection {
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
	function __construct( $host = null, $username = null, $password = null, $database = null) {

		$dotenv = new Dotenv\Dotenv(__DIR__."/../");
		$dotenv->load();

		if ( $host == null && $username == null && $password == null && $database == null ) {

			$this->host = getenv( 'LOCAL_DB_HOST' );
			$this->username = getenv( 'LOCAL_DB_USER' );
			$this->password = getenv( 'LOCAL_DB_PASSWORD' );
			$this->database = getenv( 'LOCAL_DB_NAME' );

			return ;
		}

		$this->host = getenv( 'LABS_DB_HOST' );
		$this->username = getenv( 'LABS_DB_USER' );
		$this->password = getenv( 'LABS_DB_PASSWORD' );
		$this->database = getenv( 'LABS_DB_NAME' );
	}

	/**
	 * @return Database $db
	 */
	public function db_connection() {
		$db_utilities = new DB_Utilities();

		$conn_handler = $db_utilities->db_connect( $this->host, $this->username, $this->password, $this->database );

		if ( !$conn_handler ) {
			die( "Unable to connect to database " . $db_utilities->db_error( $conn_handler ) );
		}

		$conn = $db_utilities->db_select( $conn_handler, $this->database );

		if ( $conn ) {
			return $conn_handler;
		} else {
			die ( "Unable to use database " . $db_utilities->db_error( $conn_handler ) );
		}
	}

	/**
	 * Destructor function
	 */
	function __destruct() {
		
	}
}
