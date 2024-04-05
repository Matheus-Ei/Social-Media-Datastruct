<?php

namespace src\Classes;

use src\Classes\Tree\BinaryTree;
use src\Utils\Utils;

class SocialNetwork
{
    private BinaryTree $tree;

    public function __construct()
    {
        $this->tree = new BinaryTree();
        $util = new Utils();
        $util->createUsersInTree($this->tree);
    }

    public function createAccount(): void
    {
        echo "Digite o seu nome: ";
        $name = trim(fgets(STDIN));
        echo "Digite o seu email: ";
        $email = trim(fgets(STDIN));
        echo "Digite a sua idade: ";
        $age = trim(fgets(STDIN));
        echo "Digite a sua senha: ";
        $password = trim(fgets(STDIN));
    }
}
