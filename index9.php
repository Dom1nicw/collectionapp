<?php
require_once 'AlbumsDAO.php';
require_once 'ArtistsDAO.php';

// CREATE ARRAYS OF ALBUMS AND ARTISTS //
$albumsDAO = new AlbumsDAO();
$albums = $albumsDAO->fetchAll();



$artistsDAO = new ArtistsDAO();
$artists = $artistsDAO->fetchAll();

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

echo '<pre>';
print_r($artists);
echo '</pre>';
echo '<pre>';
print_r($albums);
echo '</pre>';

function intToBritDate(string $intDate): string {
    $timestamp = strtotime($intDate);
    return date("d.m.Y", $timestamp);
}

$x = '2020-05-04';
$y = intToBritDate($x);
echo $y;