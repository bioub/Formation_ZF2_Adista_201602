<?php

namespace AddressBook\Service;

interface ServiceReadInterface
{
    public function find($id);
    public function findAll();
}
