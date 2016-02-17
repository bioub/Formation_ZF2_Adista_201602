<?php

return [
    'service_manager' => [
        'aliases' => [
            'AddressBook\Service\Contact' => 'AddressBook\Service\ContactDoctrine',
            'AddressBook\Service\Societe' => 'AddressBook\Service\SocieteDoctrine'
        ],
        'factories' => [
            'AddressBook\Service\ContactDoctrine' => \AddressBook\Service\ContactDoctrineServiceFactory::class,
            'AddressBook\Service\SocieteDoctrine' => \AddressBook\Service\SocieteDoctrineServiceFactory::class,
        ]
    ]
];