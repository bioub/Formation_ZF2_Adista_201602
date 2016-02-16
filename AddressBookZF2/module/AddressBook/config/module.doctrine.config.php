<?php

return [
    'doctrine' => [
        'driver' => [
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            'my_annotation_driver' => [
                'paths' => [
                    __DIR__ . '/../src/AddressBook/Entity'
                ],
            ],
            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => [
                'drivers' => [
                    'AddressBook\Entity' => 'my_annotation_driver'
                ]
            ]
        ]
    ]
];
