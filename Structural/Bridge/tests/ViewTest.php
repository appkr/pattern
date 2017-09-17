<?php

namespace Structural\Bridge;

use PHPUnit\Framework\TestCase;
use Structural\Bridge\Model\Movie;
use Structural\Bridge\Model\Music;

/**
 * @property MusicResource musicResource
 * @property MovieResource movieResource
 */
final class ViewTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $music = new Music(
            '김광석-사랑했지만',
            'http://cfile9.uf.tistory.com/image/2310D04654EB4A1C21A8B5',
        '어제는 하루 종일 비가 내렸어 자욱하게 내려앉은 먼지 사이로 ...'
        );
        $movie = new Movie(
            '미술관옆 동물원',
            'http://img.tenasia.hankyung.com/webwp_kr/wp-content/uploads/2015/05/2015053123571180829-540x771.jpg',
            '결혼식 비디오 촬영기사 춘희는 식장에서 자주 마주치는 반듯하고 세련된 국회의원 보좌관 인공을 짝사랑한다...'
        );
        $this->musicResource = new MusicResource($music);
        $this->movieResource = new MovieResource($movie);
        echo PHP_EOL;
    }

    public function tearDown()
    {
        echo PHP_EOL, str_repeat('-', 80), PHP_EOL;
        parent::tearDown();
    }

    /** @test */
    public function a_html_view_should_render_html_content()
    {
        $musicHtmlView = new HtmlView($this->musicResource);
        echo $musicHtmlView->render();

        $movieHtmlView = new HtmlView($this->movieResource);
        echo $movieHtmlView->render();

        $this->assertTrue(true);
    }

    /** @test */
    public function a_text_view_should_render_text_content()
    {
        $musicTextView = new TextView($this->musicResource);
        echo $musicTextView->render();

        $movieTextView = new TextView($this->movieResource);
        echo $movieTextView->render();

        $this->assertTrue(true);
    }
}