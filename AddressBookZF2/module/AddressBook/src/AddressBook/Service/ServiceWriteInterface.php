<?php

namespace AddressBook\Service;

interface ServiceWriteInterface
{
    public function add($entity);
    public function modify($entity);
    public function delete($id);
}
