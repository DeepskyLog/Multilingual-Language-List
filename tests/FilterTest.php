<?php

use PHPUnit\Framework\TestCase;

class FilterTest extends TestCase
{
    protected $maker;

    public function setUp(): void
    {
        $this->maker = new DeepskyLog\Languages\Maker;
    }

    public function testNullFilter()
    {
        $lookup = $this->maker->lookup(null);

        $this->assertArrayHasKey('es', $lookup);
        $this->assertArrayNotHasKey('ain', $lookup);
        $this->assertArrayNotHasKey('en_US', $lookup);
        $this->assertArrayNotHasKey('ar_001', $lookup);
        $this->assertArrayNotHasKey('zh_Hant', $lookup);
    }

    public function testMajorFilter()
    {
        $lookup = $this->maker->lookup('major');

        $this->assertArrayHasKey('es', $lookup);
        $this->assertArrayNotHasKey('ain', $lookup);
        $this->assertArrayNotHasKey('en_US', $lookup);
        $this->assertArrayNotHasKey('ar_001', $lookup);
        $this->assertArrayNotHasKey('zh_Hant', $lookup);
    }

    public function testMinorFilter()
    {
        $lookup = $this->maker->lookup('minor');

        $this->assertArrayHasKey('es', $lookup);
        $this->assertArrayHasKey('ain', $lookup);
        $this->assertArrayNotHasKey('en_US', $lookup);
        $this->assertArrayNotHasKey('ar_001', $lookup);
        $this->assertArrayNotHasKey('zh_Hant', $lookup);
    }

    public function testAllFilter()
    {
        $lookup = $this->maker->lookup('all');

        $this->assertArrayHasKey('es', $lookup);
        $this->assertArrayHasKey('ain', $lookup);
        $this->assertArrayHasKey('en_US', $lookup);
        $this->assertArrayHasKey('ar_001', $lookup);
        $this->assertArrayHasKey('zh_Hant', $lookup);
    }

    public function testArrayFilter()
    {
        $lookup = $this->maker->lookup(['en', 'fr']);

        $this->assertArrayHasKey('en', $lookup);
        $this->assertArrayHasKey('fr', $lookup);
        $this->assertArrayNotHasKey('de', $lookup);
        $this->assertArrayNotHasKey('en_US', $lookup);
        $this->assertArrayNotHasKey('ar_001', $lookup);
        $this->assertArrayNotHasKey('zh_Hant', $lookup);
    }
}
