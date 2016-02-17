<?php

return [
    'service_manager' => [
        'aliases' => [
            'AddressBook\Service\Contact' => 'AddressBook\Service\ContactDoctrine'
        ],
        'factories' => [
            'AddressBook\Service\ContactDoctrine' => \AddressBook\Service\ContactDoctrineServiceFactory::class
        ]
    ]
];