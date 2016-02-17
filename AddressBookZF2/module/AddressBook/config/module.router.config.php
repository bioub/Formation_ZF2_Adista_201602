<?php

return [
    'router' => [
        'routes' => [
            'address-book-contact' => [
                // PHP <= 5.4
                // 'type' => 'Zend\Mvc\Router\Http\Literal',
                // PHP >= 5.5
                'type' => Zend\Mvc\Router\Http\Literal::class,
                'options' => [
                    'route' => '/contacts',
                    'defaults' => [
                        'controller' => 'AddressBook\Controller\Contact',
                        'action' => 'list'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'add' => [
                        'type' => Zend\Mvc\Router\Http\Literal::class,
                        'options' => [
                            'route' => '/ajouter',
                            'defaults' => [
                                'controller' => 'AddressBook\Controller\Contact',
                                'action' => 'add'
                            ]
                        ]
                    ],
                    'show' => [
                        'type' => Zend\Mvc\Router\Http\Segment::class,
                        'options' => [
                            'route' => '/:id',
                            'defaults' => [
                                'controller' => 'AddressBook\Controller\Contact',
                                'action' => 'show'
                            ],
                            'constraints' => [
                                'id' => '[1-9][0-9]*'
                            ]
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'modify' => [
                                'type' => Zend\Mvc\Router\Http\Literal::class,
                                'options' => [
                                    'route' => '/modifier',
                                    'defaults' => [
                                        'controller' => 'AddressBook\Controller\Contact',
                                        'action' => 'modify'
                                    ]
                                ]
                            ],
                            'delete' => [
                                'type' => Zend\Mvc\Router\Http\Literal::class,
                                'options' => [
                                    'route' => '/supprimer',
                                    'defaults' => [
                                        'controller' => 'AddressBook\Controller\Contact',
                                        'action' => 'delete'
                                    ]
                                ]
                            ],
                        ]
                    ],
                ]
            ],
            'address-book-societe' => [
                // PHP <= 5.4
                // 'type' => 'Zend\Mvc\Router\Http\Literal',
                // PHP >= 5.5
                'type' => Zend\Mvc\Router\Http\Literal::class,
                'options' => [
                    'route' => '/societes',
                    'defaults' => [
                        'controller' => 'AddressBook\Controller\Societe',
                        'action' => 'list'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'listByVille' => [
                        'type' => Zend\Mvc\Router\Http\Segment::class,
                        'options' => [
                            'route' => '/:ville',
                            'defaults' => [
                                'controller' => 'AddressBook\Controller\Societe',
                                'action' => 'listByVille'
                            ],
                        ],
                    ],
                    'show' => [
                        'type' => Zend\Mvc\Router\Http\Segment::class,
                        'options' => [
                            'route' => '/:id',
                            'defaults' => [
                                'controller' => 'AddressBook\Controller\Societe',
                                'action' => 'show'
                            ],
                            'constraints' => [
                                'id' => '[1-9][0-9]*'
                            ]
                        ],
                    ],
                ]
            ]
        ]
    ]
];