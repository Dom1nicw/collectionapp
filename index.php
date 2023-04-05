<?php

require_once 'AlbumsDAO.php';
require_once 'ArtistsDAO.php';
require_once 'functions.php';

// CREATE ARRAYS OF ALBUMS AND ARTISTS //
$albumsDAO = new AlbumsDAO();
$albums = $albumsDAO->fetchAll();

$artistsDAO = new ArtistsDAO();
$artists = $artistsDAO->fetchAll();

// ADD ARTISTS TO EACH ALBUM OBJECT //
foreach ($albums as $album) {
    $album = matchArtistsToAlbum($album, $artists);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Collection App</title>

    <meta name="description" content="A collection of dnb albums I like">
    <meta name="author" content="iO Academy">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">

    <link rel="icon" href="images/favicon.png" sizes="192x192">
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/favicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- <script defer src="js/index.js"></script> -->
</head>

<body>

<h1>Drum and bass albums</h1>

<p class="intro">
    A collection of drum and bass albums that I like with some information about them. If you see this
    <i class="fa-solid fa-music"></i> symbol it means I decided to include it for the songs on the album and this
    <i class="fa-solid fa-eye"></i> symbol means it is there because I like the album cover (can both be there).
</p>

<section class="collection">
    <?php
    // MAKE THE HTML OF EACH ALBUM CARD //
    $html = '';
    foreach ($albums as $album) {
        $html .= albumObjectToHtml($album);
    }
    echo $html;
    ?>

</section>

</body>
</html>
