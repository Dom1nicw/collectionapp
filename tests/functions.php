<?php

require_once '../Album.php';
require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class functions extends TestCase
{
    public function testIntToBritDate_GivenDateReturnCorrectDate()
    {
        $expected = '04.10.2020';
        $date = '2020-10-04';

        $result = intToBritDate($date);

        $this->assertEquals($expected, $result);
    }

    public function testAlbumOrSingleConvert_GivenAReturnAlbum()
    {
        $expected = 'Album';
        $input = 'a';

        $result = albumOrSingleConvert($input);

        $this->assertEquals($expected, $result);
    }

    public function testReasonToSymbol_Given2ReturnEyeSymbol()
    {
        $expected = '<i class="fa-solid fa-eye"></i>';
        $input = 'visual';

        $result = reasonToSymbol($input);

        $this->assertEquals($expected, $result);
    }

    public function testNoImageIconIfNoImageInDB_GivenNullReturnLink()
    {
        $expected = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrJgwdOAjqaZGS7kn35IVm_ZN6E4XFuJ7V_g&usqp=CAU';
        $input = null;

        $result = noImageIconIfNoImageInDB($input);

        $this->assertEquals($expected, $result);
    }

    public function testNoImageIconIfNoImageInDB_GivenInputReturnInput()
    {
        $expected = 'a link';
        $input = 'a link';

        $result = noImageIconIfNoImageInDB($input);

        $this->assertEquals($expected, $result);
    }

    public function testAltTagMaker_GivenNullReturnNoImg()
    {
        $expected = 'no image in database';
        $input = new Album(1, 'album name', '2020-01-01', 'a',
            null, 'audio', 'artist');

        $result = altTagMaker($input);

        $this->assertEquals($expected, $result);
    }

    public function testAltTagMaker_GivenInputReturnAltTag()
    {
        $input = new Album(1, 'album name', '2020-01-01', 'a',
            'link.com', 'audio', 'artist');
        $expected = $input->getName() . ' album cover';

        $result = altTagMaker($input);

        $this->assertEquals($expected, $result);
    }

    public function testAlbumObjectToHtml_GivenAlbumReturnHtml()
    {
        $input = new Album(1, 'album name', '2020-01-01', 'a',
            'link.com', 'audio', 'artist');
        $expected = '<div class="card-border"><div class="album-card"><div class="img-container"><img src="link.com" alt="album name album cover"></div><h2>album name</h2><p class="album-type"> (Album)</p><p class="subtitle">ARTIST(S)</p><p class="artists">artist</p><p class="subtitle">RELEASED</p><div class="card-footer"><div>01.01.2020</div><div><i class="fa-solid fa-music"></i></div></div></div></div>';
        $result = albumObjectToHtml($input);

        $this->assertEquals($expected, $result);
    }

}
