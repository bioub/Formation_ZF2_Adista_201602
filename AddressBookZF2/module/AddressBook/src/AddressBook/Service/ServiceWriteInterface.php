<?php

namespace AddressBook\Service;

interface ServiceWriteInterface
{
    public function add($array);
    public function modify($array);
    public function delete($id);
}
