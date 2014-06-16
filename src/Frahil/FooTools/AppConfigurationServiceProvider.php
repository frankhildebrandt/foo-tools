<?php

namespace Frahil\FooTools;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AppConfigurationServiceProvider implements ServiceProviderInterface {

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple An Container instance
     */
    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
    }
}