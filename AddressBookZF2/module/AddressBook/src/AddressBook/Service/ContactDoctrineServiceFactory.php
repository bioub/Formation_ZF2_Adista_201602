<?php

namespace AddressBook\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class ContactDoctrineServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        /* @var $sm \Zend\ServiceManager\ServiceManager */
        $em = $sm->get('Doctrine\ORM\EntityManager');
        
        return new ContactDoctrineService($em);
    }
}
