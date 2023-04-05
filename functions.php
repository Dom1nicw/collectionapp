<?php

function intToBritDate(string $intDate): string {
    $timestamp = strtotime($intDate);
    return date("d.m.Y", $timestamp);
}

function albumOrSingleConvert(string $albOrSin): string {
    if ($albOrSin == 'a') {
        return 'Album';
    } else {
        return 'Single';
    }
}

function reasonToSymbol(string $reason): string {
    if ($reason == 'audio') {
        return '<i class="fa-solid fa-music"></i>';
    } elseif ($reason == 'visual') {
        return '<i class="fa-solid fa-eye"></i>';
    } else {
        return '<i class="fa-solid fa-music"></i> <i class="fa-solid fa-eye"></i>';
    }
}

function noImageIconIfNoImageInDB(?string $link): string {
    if (is_null($link)) {
        return 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrJgwdOAjqaZGS7kn35IVm_ZN6E4XFuJ7V_g&usqp=CAU';
    } else {
        return $link;
    }
}

function altTagMaker(Album $anAlbum): string {
    if (is_null($anAlbum->getLinkToImage())) {
        return 'no image in database';
    } else {
        return $anAlbum->getName() . 'album cover';
    }
}

function albumObjectToHtml(Album $anAlbum): string {
    $albOrSin = albumOrSingleConvert($anAlbum->getAlbumOrSingle());
    $anAlbum->setAlbumOrSingle($albOrSin);

    $reason = reasonToSymbol($anAlbum->getReasonForInclusion());
    $anAlbum->setReasonForInclusion($reason);

    $imagelink = noImageIconIfNoImageInDB($anAlbum->getLinkToImage());
    $anAlbum->setLinkToImage($imagelink);

    $alttag = altTagMaker($anAlbum);

    return '<div class="card-border">'
        . '<div class="album-card">'
        . '<div class="img-container">'
        . '<img src="' . $imagelink . '" alt="' . $alttag . '">'
        . '</div>'
        . '<h2>' . $anAlbum->getName() . '</h2>'
        . '<p>' . $anAlbum->getAlbumOrSingle() . '</p>'
        . '<p class="subtitle">ARTIST(S)</p>'
        . '<p>'. $anAlbum->getArtists() .'</p>'
        . '<p class="subtitle">RELEASED</p>'
        . '<div class="card-footer">'
        . '<div>' . intToBritDate($anAlbum->getReleaseDate()) . '</div>'
        . '<div>' . $anAlbum->getReasonForInclusion() . '</div>'
        . '</div>'
        . '</div>'
        . '</div>'
        ;
}

function matchArtistsToAlbum(Album $anAlbum, array $artistsArray): void {
    $albumartists = [];
    $album_id = $anAlbum->getId();
    foreach ($artistsArray as $artist) {
        if ($album_id == $artist['album_id']) {
            $albumartists[] = $artist['artist'];
        }
    }
    $albumartists = implode(", " , $albumartists);
    $anAlbum->setArtists($albumartists);
}
