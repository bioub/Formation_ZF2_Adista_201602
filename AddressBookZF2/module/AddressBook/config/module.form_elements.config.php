<?php

return array(
    'form_elements' => array(
        'invokables' => [
            'AddressBook\Form\Contact' => \AddressBook\Form\ContactForm::class
        ],
        'shared' => [
            'AddressBook\Form\Contact' => true
        ]
    )
);
