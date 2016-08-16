<?php

// official link to wmflabs server
$LINK_TL = "tools.wmflabs.org/durl-shortener/shortener.php";

// official link to the localhost server
$LINK_LH = "localhost:3000/shortener.php";

// get the current link when visited
$link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if ( $LINK_TL === $link ) {


} elseif ( $LINK_LH === $link ) {


} else {

    // Include the Checker.php file
    include 'php-scripts/Checker.php';

    exit();

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
		  <form name  = " Form" onsubmit="return validateForm()">
          <div class="row">
          <div class="col-lg-12">
              <div class="input-group input-group-lg">
                <input id="urlfield" type="text" name="link" class="form-control" placeholder="Paste a link here..." required>
                <span class="input-group-btn">
                  <button class="btn btn-shorten" type="button">SHORTEN URL</button>
                </span>
              </div>
            </div>
            </form>
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
  <script src="javascript/validate.js"></script>
</body>
</html>
