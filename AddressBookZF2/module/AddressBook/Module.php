<?php

namespace AddressBook;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface
{
    public function getConfig()
    {
        return array_merge(
            include __DIR__ . '/config/module.controllers.config.php',
            include __DIR__ . '/config/module.doctrine.config.php',
            include __DIR__ . '/config/module.router.config.php',
            include __DIR__ . '/config/module.view_manager.config.php'
        );
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}
