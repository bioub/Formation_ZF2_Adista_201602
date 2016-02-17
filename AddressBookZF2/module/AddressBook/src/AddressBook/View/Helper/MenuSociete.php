<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AddressBook\View\Helper;

/**
 * Description of MenuSociete
 *
 * @author romain
 */
class MenuSociete extends \Zend\View\Helper\AbstractHelper
{

    /**
     *
     * @var \AddressBook\Service\SocieteDoctrineService
     */
    protected $societeService;

    public function __construct(\AddressBook\Service\SocieteDoctrineService $societeService)
    {
        $this->societeService = $societeService;
    }

    public function __invoke() {
        $villes = $this->societeService->getVilles();
        
        $html = '';
        
        foreach ($villes as $nomVille) {
            $html .= sprintf('<li><a href="%s">%s</a></li>', 
                    $this->view->url('address-book-societe/listByVille', ['ville' => $nomVille]),
                    $nomVille);
        }
        
        return $html;
    }
}
