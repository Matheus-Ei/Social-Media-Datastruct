<?php

namespace src\Classes;

use src\Classes\Exceptions\EmailOrPasswordIsIncorrectException;
use src\Classes\Tree\BinaryTree;
use src\Utils\Utils;

class SocialNetwork
{

    private BinaryTree $tree;
    private ?User $user;

    private Utils $util;

    public function __construct()
    {
        $this->tree = new BinaryTree();
        $this->util = new Utils();
        $this->util->createUsersInTree($this->tree);
        $this->user = null;
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

    public function signIn(string $email, string $password): bool
    {
        try {
            $user = $this->tree->searchNodeByEmailAndPassword($this->tree->getRoot(), $email, $password);
            $this->user = new User($user->getAge(), $user->getName(), $user->getEmail(), $user->getPassword());
            echo "Login realizado com sucesso";
            $this->util::pressEnter();
            return true;
        } catch (EmailOrPasswordIsIncorrectException $e) {
            echo $e->getMessage();
            $this->util::pressEnter();
            return false;
        }
    }

    public function addFriend(string $friendEmail): void
    {

    }

    public function searchRecommendation(): void
    {

    }
}
