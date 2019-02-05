<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $string = 'test';
	    $boolean = true;

	    // $this->assertEquals($expected, $actual);

	    $this->assertEquals(true, $boolean);
	    $this->assertEquals('test', $string);

	    $this->assertTrue($boolean);
	    $this->assertFalse(!$boolean);
    }
}
