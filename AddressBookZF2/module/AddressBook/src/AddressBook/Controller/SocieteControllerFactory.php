<?php
namespace AddressBook\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SocieteControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $cm)
    {
        /* @var $cm \Zend\Mvc\Controller\ControllerManager */
        $sm = $cm->getServiceLocator();
        
        $societeService = $sm->get('AddressBook\Service\Societe');
        
        return new SocieteController($societeService);
    }

}
