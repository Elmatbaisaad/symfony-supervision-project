<?php

class ExampleAssertionsTest extends \PHPUnit\Framework\TestCase
{
    public function testThatStringMatch()
    {
        $string1 = 'test';
        $string2 = 'test';
        $string3 = 'Test';
        $this->assertSame($string1,$string2);
        //$this->assertSame($string2,$string3);
    }

    public function testThatNumberAddUp()
    {
        $this->assertEquals(10,10);
    }

}