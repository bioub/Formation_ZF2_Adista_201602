<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AddressBook\Controller;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of ControllerAbstractFactory
 *
 * @author romain
 */
class ControllerAbstractFactory implements AbstractFactoryInterface
{
    public function canCreateServiceWithName(ServiceLocatorInterface $cm, $name, $requestedName)
    {
        return strpos($requestedName, 'AddressBook\\Controller\\') === 0;
    }

    public function createServiceWithName(ServiceLocatorInterface $cm, $name, $requestedName)
    {
        list(,,$entity) = explode('\\', $requestedName);
        
        /* @var $cm \Zend\Mvc\Controller\ControllerManager */
        $sm = $cm->getServiceLocator();
        
        $contactService = $sm->get("AddressBook\\Service\\$entity");
        $controllerClass = 'AddressBook\\Controller\\' . $entity . 'Controller';
        
        return new $controllerClass($contactService);
    }

}
