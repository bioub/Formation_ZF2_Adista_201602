<?php

namespace AddressBook\Service;

use Doctrine\ORM\EntityManager;

class SocieteDoctrineService implements ServiceReadInterface
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
        return $this->em->getRepository(\AddressBook\Entity\Societe::class);
    }

    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    public function findAll()
    {
        return $this->getRepository()->findAll();
    }
    
    public function findByVille($ville)
    {
        return $this->getRepository()->findBy(['ville' => $ville]);
    }

    public function getVilles() {
        $query = $this->em->createQuery('SELECT DISTINCT s.ville FROM AddressBook\Entity\Societe s ORDER BY s.ville');
        $villes = $query->getScalarResult();
        
        // Pour revenir à une dimension
        $villes = array_map(function ($row) {
            return $row['ville'];
        }, $villes);
        
        return $villes;
    }
}
