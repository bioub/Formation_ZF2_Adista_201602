<?php

namespace AddressBook\View\Helper;

class MenuSocieteFactory implements \Zend\ServiceManager\FactoryInterface
{
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $vhpm)
    {
        /* @var $vhpm \Zend\View\HelperPluginManager */
        // echo get_class($vhpm); pour retrouver le nom de la classe
        $sm = $vhpm->getServiceLocator();
        
        $societeService = $sm->get('AddressBook\Service\Societe');
        
        return new MenuSociete($societeService);
    }
}
