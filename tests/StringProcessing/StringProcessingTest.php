<?php

use function CiscoDelgado\CommonUtilities\StringProcessing\snake_to_camel;
use function CiscoDelgado\CommonUtilities\StringProcessing\camel_to_snake;
use function CiscoDelgado\CommonUtilities\StringProcessing\truncate;
use function CiscoDelgado\CommonUtilities\StringProcessing\strip_white_space;
use function CiscoDelgado\CommonUtilities\StringProcessing\slugify;

class StringProcessingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider strings
     */
    public function it_should_camelize_strings($camel, $snake)
    {
        $this->assertEquals($camel, snake_to_camel($snake));
    }

    /**
     * @test
     * @dataProvider strings
     */
    public function it_should_convert_to_snake_from_camel($camel, $snake)
    {
        $this->assertEquals($snake, camel_to_snake($camel));
    }

    /**
     * @test
     * @dataProvider longText
     */
    public function it_should_truncate_a_text($truncatedText, $longText, $maxLength)
    {
        $this->assertEquals($truncatedText, truncate($longText, $maxLength));
    }

    /** @test */
    public function it_should_strip_white_spaces()
    {
        $whitespaceText = 'Lorem  ipsum    dolor sit amet   ';
        $cleanedText = 'Lorem ipsum dolor sit amet';

        $this->assertEquals($cleanedText, strip_white_space($whitespaceText));
    }

    /** @test */
    public function it_should_slugify_a_text()
    {
        $normalText = 'Text wïth Spécial, çhars. Accénts eñes & %';
        $slugifiedText = 'text-with-special-chars-accents-enes';

        $this->assertEquals($slugifiedText, slugify($normalText));
    }

    /**
     * @return array
     */
    public function strings()
    {
        return [
            ['simpleTest', 'simple_test'],
            ['easy', 'easy'],
            ['html', 'html'],
            ['simpleXml', 'simple_xml'],
            ['pdfLoad', 'pdf_load'],
            ['startMiddleLast', 'start_middle_last'],
            ['aString', 'a_string'],
            ['some4Numbers234', 'some4_numbers234'],
            ['test123String', 'test123_string']
        ];
    }

    /**
     * @return array
     */
    public function longText()
    {
        return [
            ['Lorem ipsum dolor sit amet...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pulvinar elementum felis et tincidunt. Donec venenatis sagittis volutpat. Sed rhoncus rhoncus suscipit. Phasellus feugiat, metus nec bibendum elementum, urna lectus auctor lorem, eget laoreet lacus ligula vel odio. Nulla porta diam et ex porta aliquam. Praesent vel diam porttitor, tempor neque eget, ullamcorper ipsum. Aenean est odio, mattis aliquam ligula vitae, porttitor lacinia nisl. Nam accumsan erat sed vulputate accumsan. Integer vel dapibus eros.', 30],
            ['Lorem ipsum dolor sit amet, consectetur...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pulvinar elementum felis et tincidunt. Donec venenatis sagittis volutpat. Sed rhoncus rhoncus suscipit. Phasellus feugiat, metus nec bibendum elementum, urna lectus auctor lorem, eget laoreet lacus ligula vel odio. Nulla porta diam et ex porta aliquam. Praesent vel diam porttitor, tempor neque eget, ullamcorper ipsum. Aenean est odio, mattis aliquam ligula vitae, porttitor lacinia nisl. Nam accumsan erat sed vulputate accumsan. Integer vel dapibus eros.', 40]
        ];
    }
}
