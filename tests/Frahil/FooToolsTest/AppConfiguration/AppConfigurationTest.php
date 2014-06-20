<?php

namespace Frahil\FooToolsTest\AppConfiguration;


use Frahil\FooTools\AppConfiguration\AppConfiguration;
use Frahil\FooToolsTest\BaseTestCase;

class AppConfigurationTest extends BaseTestCase
{

    /**
     * @test
     */
    public function test_bootstrapp()
    {
        $config = new AppConfiguration(".test.config.php");
        $config->set("test.112","foo");

        $this->assertEquals("foo", $config->get("test.112"));
    }

} 