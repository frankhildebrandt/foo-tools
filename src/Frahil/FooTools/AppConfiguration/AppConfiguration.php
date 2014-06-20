<?php

namespace Frahil\FooTools\AppConfiguration;


class AppConfiguration implements AppConfigurationInterface
{

    /**
     * @var string
     */
    private $configurationFile;

    /**
     * @var array
     */
    private $configurationCache;

    public function __construct($configurationFileName)
    {
        $this->configurationFile = $configurationFileName;
    }

    public function get($configurationKey)
    {
        $this->ensureWarmCache();
        if (isset($this->configurationCache[$configurationKey])) {
            return $this->configurationCache[$configurationKey];
        }
        return null;
    }

    public function set($configurationKey, $value) {
        $this->ensureWarmCache();
        $this->configurationCache[$configurationKey] = $value;
        ksort($this->configurationCache);
        file_put_contents($this->configurationFile, "<?php return ".var_export($this->configurationCache, true).";");
    }

    public function loadFromConfigFile()
    {
        if (file_exists($this->configurationFile)) {
            $this->configurationCache = (array)include($this->configurationFile);
        } else {
            $this->configurationCache = array();
        }
    }

    private function ensureWarmCache()
    {
        if (!$this->configurationCache) {
            $this->loadFromConfigFile();
        }
    }
}