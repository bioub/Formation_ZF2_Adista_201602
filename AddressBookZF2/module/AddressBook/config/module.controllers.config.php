<?php

return [
    'controllers' => [
//        'invokables' => [
//            'AddressBook\Controller\Contact' => AddressBook\Controller\ContactController::class
//        ]
        'factories' => [
            'AddressBook\Controller\Contact' => AddressBook\Controller\ContactControllerFactory::class,
            'AddressBook\Controller\Societe' => AddressBook\Controller\SocieteControllerFactory::class
        ]
    ]
];