<?php

return [
    'service_manager' => [
        'factories' => [
            'translator' => \Zend\Mvc\Service\TranslatorServiceFactory::class,
        ],
        'delegators' => [
            'MvcTranslator' => [
                AddressBook\I18n\TranslatorI18nResourceDelegator::class
            ],
        ],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type'     => 'phparray',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.php',
            ],
        ],
    ],
    
];