<?php

namespace AddressBook\InputFilter;

class ContactInputFilter extends \Zend\InputFilter\InputFilter
{
    public function __construct() {
        
        $input = new \Zend\InputFilter\Input('prenom');
        $input->setRequired(true);
        
        $filter = new \Zend\Filter\StringTrim();
        $input->getFilterChain()->attach($filter);
        
        $validator = new \Zend\Validator\StringLength();
        $validator->setMax(40);
        $input->getValidatorChain()->attach($validator);
        
        $this->add($input);
        
    }
}
