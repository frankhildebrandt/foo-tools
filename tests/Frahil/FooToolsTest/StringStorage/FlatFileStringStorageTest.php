<?php

namespace Frahil\FooToolsTest\StringStorage;


use Frahil\FooTools\StringStorage\FlatFileStringStorage;
use Frahil\FooToolsTest\BaseTestCase;

class FlatFileStringStorageTest extends BaseTestCase{

    /**
     * @test
     */
    public function store__called_with_data__stores_the_data_into_a_file() {
        $filename = $this->getTempFilename();
        $ffStorage = new FlatFileStringStorage($filename);
        $ffStorage->store("data");
        $this->assertEquals("data", file_get_contents($filename));
        unlink($filename);
    }

    /**
     * @test
     */
    public function fetch__called_with_non_existing_file__returns_an_empty_string() {
        $filename = $this->getTempFilename();
        $ffStorage = new FlatFileStringStorage($filename);
        $this->assertEquals('',$ffStorage->fetch());
    }

    /**
     * @test
     */
    public function fetch__called_with_existing_file__returns_its_contents() {
        $filename = $this->getTempFilename();
        $ffStorage = new FlatFileStringStorage($filename);
        file_put_contents($filename,"data");
        $this->assertEquals("data", $ffStorage->fetch());
        unlink($filename);
    }

    public function testTempFilename() {
        $this->assertNotEquals($this->getTempFilename(), $this->getTempFilename());
    }

    /**
     * @return string
     */
    protected function getTempFilename()
    {
        $filename = tempnam(null, "footest_");
        return $filename;
    }

} 