<?php include "functions.php"; ?>

<!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
 	<meta charset=utf-8>
 	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,600,700,800" rel="stylesheet">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="http://localhost/FEBBRAIO/php-boolcrud-ajax/dist/app.css">
 	<title><?php echo getThePageName();?></title>
 </head>
 <body>

  <!-- main_container - start -->
  <div id="main_container">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="http://localhost/FEBBRAIO/php-boolcrud-ajax/">Hotel Booleana</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/FEBBRAIO/php-boolcrud-ajax/guests">Guests <span class="sr-only">(current)</span></a>
          </li>
          <?php if (getThePageName() !== 'new.php') { ?>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/FEBBRAIO/php-boolcrud/new.php">Add New<i class="fas fa-plus-square ml-3"></i></a>
            </li>
          <?php  } ?>
        </ul>
      </div>
    </nav>

    <!-- page_content - start -->
    <div id="page_content">
