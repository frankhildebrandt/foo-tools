<?php

namespace Frahil\FooTools\AppConfiguration;


class AppConfiguration implements AppConfigurationInterface {

    /**
     * @var
     */
    private $configurationFile;

    public function __construct($configurationFileName)
    {
        $this->configurationFile = $configurationFileName;
    }


}