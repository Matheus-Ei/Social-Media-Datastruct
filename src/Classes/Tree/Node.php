<?php

namespace src\Classes\Tree;

use src\Classes\User;

class Node
{
    public User $data;
    public ?Node $leftChild;
    public ?Node $rightChild;

    public function __construct($data)
    {
        $this->data = $data;
        $this->leftChild = null;
        $this->rightChild = null;
    }
}
