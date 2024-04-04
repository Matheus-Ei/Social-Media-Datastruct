<?php

namespace src\Utils;

use src\Classes\BinaryTree;
use src\Classes\SocialNetwork;
use src\Classes\User;

class Utils
{
    public function createUsersInTree(BinaryTree $socialNetwork): void
    {
        $socialNetwork->insertUser(new User(20, "Alexandre", $socialNetwork->generateId(), "alexandre@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(16, "Gabriel", $socialNetwork->generateId(), "gabriel@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(44, "Marcos", $socialNetwork->generateId(), "marcos@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(34, "Julia", $socialNetwork->generateId(), "julia123@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(42, "Ana", $socialNetwork->generateId(), "ana@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(21, "Lucas", $socialNetwork->generateId(), "lucas@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(19, "Matheus", $socialNetwork->generateId(), "matheus@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(19, "Victoria", $socialNetwork->generateId(), "victoria@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(60, "Marcelo", $socialNetwork->generateId(), "marcelo@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(28, "Pedro", $socialNetwork->generateId(), "pedro@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(18, "Maria", $socialNetwork->generateId(), "maria@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(34, "Thiago", $socialNetwork->generateId(), "thiago@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(99, "Jorge", $socialNetwork->generateId(), "jorge@gmail.com", "123456"));
        $socialNetwork->insertUser(new User(99, "Lionel Ronaldo Junior", $socialNetwork->generateId(), "lrj@gmail.com", "123456"));
    }
}
