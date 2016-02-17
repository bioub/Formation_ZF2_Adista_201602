<?php

namespace AddressBook\Service;

use Doctrine\ORM\EntityManager;

class ContactDoctrineService implements ServiceInterface
{

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
        return $this->em->getRepository(\AddressBook\Entity\Contact::class);
    }

    public function add($entity)
    {
        
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

    public function modify($entity)
    {
        
    }

}
