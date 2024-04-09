<?php

namespace src\Utils;

use src\Classes\Exceptions\EmailAlreadyExistsException;
use src\Classes\Tree\BinaryTree;
use src\Classes\User;

class Utils
{
    public function createUsersInTree(BinaryTree $socialNetwork): void
    {
        $socialNetwork->insert(new User(20, "Alexandre", "alexandre@gmail.com", "123456"));
        $socialNetwork->insert(new User(16, "Gabriel", "gabriel@gmail.com", "123456"));
        $socialNetwork->insert(new User(44, "Marcos", "marcos@gmail.com", "123456"));
        $socialNetwork->insert(new User(34, "Julia", "julia123@gmail.com", "123456"));
        $socialNetwork->insert(new User(42, "Ana", "ana@gmail.com", "123456"));
        $socialNetwork->insert(new User(21, "Lucas", "lucas@gmail.com", "123456"));
        $socialNetwork->insert(new User(19, "Matheus", "matheus@gmail.com", "123456"));
        $socialNetwork->insert(new User(19, "Victoria", "victoria@gmail.com", "123456"));
        $socialNetwork->insert(new User(60, "Marcelo", "marcelo@gmail.com", "123456"));
        $socialNetwork->insert(new User(28, "Pedro", "pedro@gmail.com", "123456"));
        $socialNetwork->insert(new User(18, "Maria", "maria@gmail.com", "123456"));
        $socialNetwork->insert(new User(34, "Thiago", "thiago@gmail.com", "123456"));
        $socialNetwork->insert(new User(99, "Jorge", "jorge@gmail.com", "123456"));
        $socialNetwork->insert(new User(99, "Lionel Ronaldo Junior", "lrj@gmail.com", "123456"));
    }

    public static function pressEnter(): void
    {
        echo "Precione a tecla 'enter' para continuar" . PHP_EOL;
        fgets(STDIN);
    }
}
