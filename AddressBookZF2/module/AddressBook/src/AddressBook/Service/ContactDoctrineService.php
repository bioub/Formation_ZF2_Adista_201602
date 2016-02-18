<?php

namespace AddressBook\Service;

use AddressBook\Entity\Contact;
use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

class ContactDoctrineService implements ServiceInterface, ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    /**
     *
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function getRepository()
    {
        return $this->em->getRepository(Contact::class);
    }

    public function add($array)
    {
        $sm = $this->getServiceLocator();
        $form = $sm->get('FormElementManager')->get('AddressBook\Form\Contact');
        /* @var $form \AddressBook\Form\ContactForm */
        
        // TODO ajouter une clé AddressBook\InputFilter\Contact au Service Manager (idéalement dans InputFilterPluginManager)
        $inputFilter = new \AddressBook\InputFilter\ContactInputFilter();
        
        $form->setInputFilter($inputFilter);
        $form->setData($array);
        
        if (!$form->isValid()) {
            return null;
        }
        
        $dataFiltrees = $form->getData();
        $hm = $this->getServiceLocator()->get('HydratorManager');
        $hydrator = $hm->get('DoctrineModule\Stdlib\Hydrator\DoctrineObject');
        
        $contact = new Contact();
        $hydrator->hydrate($dataFiltrees, $contact);
        
        $this->em->persist($contact);
        $this->em->flush();
        
        return $contact;
    }

    public function delete($id)
    {
        $entity = $this->getRepository()->find($id);
        
        if (!$entity) {
            return null;
        }
        
        $this->em->remove($entity);
        $this->em->flush();
        
        return $entity;
    }

    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    public function modify($array)
    {
        
    }

}
