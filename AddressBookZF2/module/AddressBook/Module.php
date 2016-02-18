<?php

namespace AddressBook;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements \Zend\ModuleManager\Feature\BootstrapListenerInterface, ConfigProviderInterface, AutoloaderProviderInterface
{
    public function onBootstrap(\Zend\EventManager\EventInterface $e)
    {
        /* @var $e \Zend\Mvc\MvcEvent */
        $eventManager        = $e->getApplication()->getEventManager();
        
        $sm = $e->getApplication()->getServiceManager();
        $translator = $sm->get('MvcTranslator');
        \Zend\Validator\AbstractValidator::setDefaultTranslator($translator);
    }
    
    public function getConfig()
    {
        return array_merge_recursive(
            include __DIR__ . '/config/module.controllers.config.php',
            include __DIR__ . '/config/module.doctrine.config.php',
            include __DIR__ . '/config/module.form_elements.config.php',
            include __DIR__ . '/config/module.router.config.php',
            include __DIR__ . '/config/module.service_manager.config.php',
            include __DIR__ . '/config/module.translator.config.php',
            include __DIR__ . '/config/module.view_helpers.config.php',
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
