<?php

namespace AddressBook\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    protected function getRepository() 
    {
        $sm = $this->getServiceLocator();
        $em = $sm->get('Doctrine\ORM\EntityManager');
        /* @var $em \Doctrine\ORM\EntityManager */
        return $em->getRepository(\AddressBook\Entity\Contact::class);
    }
    
    public function listAction()
    {   
        return new ViewModel([
            'contacts' => $this->getRepository()->findAll()
        ]);
    }
    
    public function showAction()
    {   
        $id = $this->params('id');
        
        $contact = $this->getRepository()->find($id);
        
        if (!$contact) {
            return $this->createHttpNotFoundModel($this->response);
        }
        
        return new ViewModel([
            'contact' => $contact
        ]);
    }
    
    public function addAction()
    {   
        return new ViewModel([
            
        ]);
    }
    
    public function modifyAction()
    {   
        return new ViewModel([
            
        ]);
    }
    
    public function deleteAction()
    {   
        return new ViewModel([
            
        ]);
    }
}
