<?php

namespace AddressBook\Controller;

use AddressBook\Service\ServiceInterface;
use AddressBook\Service\ServiceReadInterface;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SocieteController extends AbstractActionController
{

    /** @var Request */
    protected $request;

    /** @var Response */
    protected $response;

    /**
     *
     * @var ServiceInterface
     */
    protected $societeService;

    public function __construct(ServiceReadInterface $societeService)
    {
        $this->societeService = $societeService;
    }

    public function listAction()
    {
        return new ViewModel([
            'societes' => $this->societeService->findAll()
        ]);
    }
    
    public function listByVilleAction()
    {
        $ville = $this->params('ville');
        
        $view = new ViewModel([
            'societes' => $this->societeService->findByVille($ville),
            'ville' => $ville
        ]);
        
        $view->setTemplate('address-book/societe/list.phtml');
        
        return $view;
    }

    public function showAction()
    {
        $id = $this->params('id');

        $societe = $this->societeService->find($id);

        if (!$societe) {
            return $this->createHttpNotFoundModel($this->response);
        }

        return new ViewModel([
            'societe' => $societe
        ]);
    }

}
