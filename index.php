<?php

require_once 'AlbumsDAO.php';
require_once 'ArtistsDAO.php';

// CREATE ARRAYS OF ALBUMS AND ARTISTS //
$albumsDAO = new AlbumsDAO();
$albums = $albumsDAO->fetchAll();

$artistsDAO = new ArtistsDAO();
$artists = $artistsDAO->fetchAll();

function intToBritDate(string $intDate): string {
    $timestamp = strtotime($intDate);
    return date("d.m.Y", $timestamp);
}

// ADD ARTISTS TO EACH ALBUM OBJECT //
foreach ($albums as $album) {
    $album_id = $album->getId();
    $albumartists = [];
    foreach ($artists as $artist) {
        if ($album_id == $artist['album_id']) {
            $albumartists[] = $artist['artist'];
        }
    }
    $albumartists = implode(", " , $albumartists);
    $album->setArtists($albumartists);
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
    $html = '';
    foreach ($albums as $album) {

        if ($album->getAlbumOrSingle() == 'a') {
            $type = 'Album';
        } else {
            $type = 'Single';
        }

        if ($album->getReasonForInclusion() == 'audio') {
            $reason = '<i class="fa-solid fa-music"></i>';
        } elseif ($album->getReasonForInclusion() == 'visual') {
            $reason = '<i class="fa-solid fa-eye"></i>';
        } else {
            $reason = '<i class="fa-solid fa-music"></i> <i class="fa-solid fa-eye"></i>';
        }

        $html .= '<div class="card-border">'
            . '<div class="album-card">'
            . '<div class="img-container">'
            . '<img src="https://i.scdn.co/image/ab67616d0000b273c061423a25e84bddcb60bd97" alt="' . $album->getName()
            . ' album cover">'
            . '</div>'
            . '<h2>' . $album->getName() . '</h2>'
            . '<p>' . $type . '</p>'
            . '<p class="subtitle">ARTIST(S)</p>'
            . '<p>'. $album->getArtists() .'</p>'
            . '<p class="subtitle">RELEASED</p>'
            . '<div class="card-footer">'
            . '<div>' . intToBritDate($album->getReleaseDate()) . '</div>'
            . '<div>' . $reason . '</div>'
            . '</div>'
            . '</div>'
            . '</div>';
    }
    echo $html;
    ?>
<!--    function intToBritDate(string $intDate): string {-->
<!--    $timestamp = strtotime($intDate);-->
<!--    return date("d M Y", $timestamp);-->
<!--    }-->
</section>

</body>
</html>
