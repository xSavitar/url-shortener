<?php
//Official Link to server
$LINK = "localhost:3000/";

$link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//return var_dump($link);

if ($LINK === $link) {
    
}

else {
    include 'php-scripts/db-connection.php';

    $query = "SELECT * FROM urls WHERE short_url='$link';";

    $results = mysql_query($query);
    if(!$results){
      die();
    }
    if($results > 0){
       $row = mysql_fetch_row($results);
       header("Location: " . $row[2] . "");
    }
    else {
      header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>URL Shortener - d3r1ck</title>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="css/styles.css" rel="stylesheet">
</head>
<body>

  <div class="site-wrapper">
    <div class="site-wrapper-inner">
      <div class="main-container">
        <div class="inner cover">
          <span class="glyphicon glyphicon-link"></span>
          <h1>URL Shortener</h1>
          <h4>d3r1ck</h4>

          <div class="row">
          <div class="col-lg-12">
              <div class="input-group input-group-lg">
                <input id="urlfield" type="text" name="link" class="form-control" placeholder="Paste a link here...">
                <span class="input-group-btn">
                  <button class="btn btn-shorten" type="button">SHORTEN URL</button>
                </span>
              </div>
            </div>
            <div class="col-lg-12">
              <div id="link"></div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="javascript/shorten.js"></script>
</body>
</html>