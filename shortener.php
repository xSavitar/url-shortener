<?php

// official link to wmflabs server
$LABS_HOST = "tools.wmflabs.org/durl-shortener/shortener.php";

// official link to the localhost server
$LOCAL_HOST = "localhost:3000/shortener.php";

// request link (link with hash)
$request_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$html = <<<EOD
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
                  <input id="urlfield" type="text" name="link" class="form-control" placeholder="Paste a link here..." required>
                  <span class="input-group-btn">
                    <button class="btn btn-shorten" type="submit">SHORTEN URL</button>
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
    <script src="js/shorten.js"></script>
  </body>
  </html>
EOD;


if ( $request_link === $LABS_HOST ) {

  echo $html;

} elseif ( $request_link === $LOCAL_HOST ) {

  echo $html;

} else {
  require_once 'vendor/autoload.php';

  // Include the Checker.php file
  include 'php/Checker.php';

  exit();

}
