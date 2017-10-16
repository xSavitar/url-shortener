<?php

include ( "DB_Connection.php" );
include ( "DB_Utilities.php" );

// official link to wmflabs server
$LABS_HOST = "tools.wmflabs.org";

// official link to the localhost server
$LOCAL_HOST = "localhost:3000";

// get host link
$host_link = $_SERVER['HTTP_HOST'];

// get input link
$request_link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if ( $host_link === $LABS_HOST ) {

  $database_obj = new DB_Connection( "", "", "", "" );

} 

if ( $host_link === $LOCAL_HOST ) {

  $database_obj = new DB_Connection( null, null, null, null );

}

$con = $database_obj->db_connection();

if ( $con ) {

  $query = "SELECT * FROM urls WHERE short_url='$request_link';";

  $db_utility_obj = new DB_Utilities();

  $results = $db_utility_obj->db_query( $con, $query );

  if ( !$results ) {

    die( "Didn't get/register any results. Check database connection: " . $results);

  }

  $row_count = $db_utility_obj->db_num_rows( $results );

  if ( $row_count > 0 ) {

    $row = $db_utility_obj->db_fetch_row( $results );

    header( "Location: " . $row[2] );

  }
  else {

    header( "Location: shortener.php" );

  }
} else {

  die ( "Couldn't connect to Database, try again later!" );

}
