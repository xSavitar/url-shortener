<?php

include 'DB_Connection.php';
include 'DB_Utilities.php';

// official link to wmflabs server
$LINK_TL = "tools.wmflabs.org/durl-shortener/shortener.php";

// official link to the localhost server
$LINK_LH = "localhost:3000/shortener.php";

// get the current link when visited
$link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if ( $LINK_TL === $link ) {
    
  $database_obj = new DB_Connection( '', '', '' );

} elseif ( $LINK_LH === $link ) {

}

else {
    if ( $_SERVER[HTTP_HOST] == "localhost:3000" ) {
    
      $database_obj = new DB_Connection( null, null, null );

    } else {

      $database_obj = new DB_Connection( 'host', 'username', 'password' );

    }

    $connection = $database_obj->db_connection();
    $database_obj->db_select($connection);

    $query = "SELECT * FROM urls WHERE short_url='$link';";

    $db_utility_obj = new DB_Utilities();

    $results = $db_utility_obj->db_query($query);
    if(!$results){
      die();
    }
    if($results > 0){
       $row = $db_utility_obj->db_fetch_row($results);
       //return var_dump("I am here....");
       header("Location: " . $row[2] . "");
    }
    else {
      header("Location: shortener.php");
    }
}
