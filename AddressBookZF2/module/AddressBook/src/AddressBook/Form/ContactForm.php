<?php

namespace AddressBook\Form;

use AddressBook\Entity\Societe;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use Zend\Form\Element\Email;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class ContactForm extends Form implements ObjectManagerAwareInterface
{
    use ProvidesObjectManager;
    
    public function __construct()
    {
        parent::__construct('contactForm');
    }
    
    public function init() {
        $element = new Text('prenom');
        $element->setLabel('Prénom');
        $this->add($element);

        $element = new Text('nom');
        $element->setLabel('Nom');
        $this->add($element);

        $element = new Email('email');
        $element->setLabel('Email');
        $this->add($element);

        $element = new Text('telephone');
        $element->setLabel('Téléphone');
        $this->add($element);

        $this->add(
                array(
                    'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                    'name' => 'societe',
                    'options' => array(
                        'object_manager' => $this->getObjectManager(),
                        'target_class' => Societe::class,
                        'property' => 'nom',
                        'display_empty_item' => true,
                        'label' => 'Société',
                        'empty_item_label' => '-- Pas de société --',
                    ),
                )
        );
    }
}
