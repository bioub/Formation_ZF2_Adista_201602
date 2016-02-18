<?php

namespace AddressBookTest\Entity;

class ContactTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        require_once __DIR__ . '/../../../src/AddressBook/Entity/Contact.php';
        $this->contact = new \AddressBook\Entity\Contact();
    }
    
    public function testInitialValuesAreNull()
    {
        $this->assertNull($this->contact->getId());
        $this->assertNull($this->contact->getPrenom());
        $this->assertNull($this->contact->getNom());
        $this->assertNull($this->contact->getEmail());
        $this->assertNull($this->contact->getTelephone());
        $this->assertNull($this->contact->getSociete());
    }
    
    public function testSetPrenom()
    {
        $this->contact->setPrenom('Romain');
        
        $this->assertEquals('Romain', $this->contact->getPrenom());
    }

}
