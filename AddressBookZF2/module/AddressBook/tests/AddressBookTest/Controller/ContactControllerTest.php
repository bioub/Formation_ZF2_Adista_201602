<?php

namespace AddressBookTest\Controller;

use \Mockery as m;

class ContactControllerTest extends \Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase
{
    protected function setUp() {
        $this->setApplicationConfig(require 'config/application.config.php');
        
    }
    
    public function testListActionIsAccessible()
    {
        $this->dispatch('/contacts');
        
        $this->assertResponseStatusCode(200);
        $this->assertActionName('list');
    }
    
    public function testListActionContainsContacts()
    {
        $this->dispatch('/contacts');
        
        $this->assertQueryCount('tr', 5);
    }
    
    public function testListContainsContactsAvecMock()
    {
        $service = m::mock(\AddressBook\Service\ContactDoctrineService::class);
        $service->shouldReceive('findAll')->times(1)->andReturn(array(
            (new \AddressBook\Entity\Contact)->setId(1)->setPrenom('Romain')->setNom('Bohdanowicz'),
            (new \AddressBook\Entity\Contact)->setId(2)->setPrenom('Romain')->setNom('Bohdanowicz')
        ));
        
        $this->getApplicationServiceLocator()
                ->setAllowOverride(true)
                ->setService('AddressBook\Service\Contact', $service);
        
        $this->dispatch('/contacts');
        
        $this->assertQueryCount('tr', 2);
    }
}
