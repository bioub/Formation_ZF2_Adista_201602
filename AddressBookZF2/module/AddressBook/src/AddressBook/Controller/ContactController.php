<?php

namespace AddressBook\Controller;

use AddressBook\Service\ServiceInterface;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{

    /** @var Request */
    protected $request;

    /** @var Response */
    protected $response;

    /**
     *
     * @var ServiceInterface
     */
    protected $contactService;

    public function __construct(ServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }

    public function listAction()
    {
        return new ViewModel([
            'contacts' => $this->contactService->findAll()
        ]);
    }

    public function showAction()
    {
        $id = $this->params('id');

        $contact = $this->contactService->find($id);

        if (!$contact) {
            return $this->createHttpNotFoundModel($this->response);
        }

        return new ViewModel([
            'contact' => $contact
        ]);
    }

    public function addAction()
    {
        $contactForm = $this->getServiceLocator()->get('FormElementManager')->get('AddressBook\Form\Contact');
        
        if ($this->request->isPost()) {
            $dataBrutes = $this->request->getPost();
            
            $contact = $this->contactService->add($dataBrutes);
            
            if ($contact) {
                $msg = "Le contact " . $contact->getPrenom() . " a bien été créé";
                
                $this->flashMessenger()->addSuccessMessage($msg);
                
                return $this->redirect()->toRoute('address-book-contact');
            }
        }
        
        // return new ViewModel(compact($contactForm));
        return new ViewModel([
            'contactForm' => $contactForm
        ]);
    }

    public function modifyAction()
    {
        return new ViewModel([
        ]);
    }

    public function deleteAction()
    {
        if ($this->request->isPost()) {

            if ($this->request->getPost('confirm') === 'oui') {
                $id = $this->params('id');
                
                $this->contactService->delete($id);
            }

            return $this->redirect()->toRoute('address-book-contact');
        }

        return $this->showAction();
    }

}
