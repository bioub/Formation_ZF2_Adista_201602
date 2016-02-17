<?php
namespace AddressBook\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ContactControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $cm)
    {
        /* @var $cm \Zend\Mvc\Controller\ControllerManager */
        $sm = $cm->getServiceLocator();
        
        $contactService = $sm->get('AddressBook\Service\Contact');
        
        return new ContactController($contactService);
    }

}
