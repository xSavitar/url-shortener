<?php
//Import the Database configurations
include("DB_Connection.php");
include("DB_Utilities.php");
include('environment.php');

$environment = new Environment();

$env = 'dev';

if (str_pos('localhost', $_SERVER['HTTP_HOST']) === false) {
    $env = 'production';
}

$host = $environment->getHost($env);
$script = $environment->getScript($env);

$db = new DB_Connection();

if ($env === 'production') {
    $db = new DB_Connection('host', 'username', 'password', 'database');
}

// make sure the post is parsed and data is gotten
if (isset($_POST['link']) && !empty($_POST['link'])) {
    // check if long_link already exist in the datadase
    $connection = $db->db_connection();

    $long_link = mysqli_real_escape_string($connection, $_POST['link']); // Escape this, otherwise you're open to SQL injection attacks, better off using prepared statements

    $search = "SELECT * FROM urls WHERE long_url = '$long_link'";

    $db_utilities = new DB_Utilities();

    $res = $db_utilities->db_query($connection, $search);

    if (!$res) {

        die("Error running query" . $db_utilities->db_error($connection));

    }

    if ($db_utilities->db_num_rows($res) > 0) {

        $results = $db_utilities->db_fetch_row($res);

        echo json_encode(["shortUrl" => $results[1]]);

    } else {

        $hash = substr(strtolower(preg_replace('/[0-9_\/]+/', '', base64_encode(sha1($long_link)))), 0, 8);

        $short_link = mysqli_real_escape_string($connection, $host . DIRECTORY_SEPARATOR . $hash);

        $query = "INSERT INTO urls(short_url, long_url) VALUES ('$short_link', '$long_link');";

        $res = $db_utilities->db_query($connection, $query);

        if (!$res) {
            die("Error running query" . $db_utilities->db_error($connection));
        }

        echo json_encode(["shortUrl" => $short_link, "hash" => $hash]);
    }
}
