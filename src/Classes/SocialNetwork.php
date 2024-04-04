<?php

namespace src\Classes;

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

    public function login()
    {
        echo "Digite o seu email: ";
        $email = trim(fgets(STDIN));
        echo "Digite a sua senha: ";
        $password = trim(fgets(STDIN));

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
        $this->tree->insertUser(new User($age, $name, $this->tree->generateId(), $email, $password));
    }

    public function showUsers(): void
    {
        $this->tree->inorderTraversal($this->tree->root);
    }

    public function addFriendship(): void
    {
        echo "Digite o seu codigo";
        $userId = trim(fgets(STDIN));
        echo "Digite o codigo do seu amigo";
        $friendId = trim(fgets(STDIN));
        $user = $this->tree->searchNodeByID($this->tree->root, $userId);
        $friend = $this->tree->searchNodeByID($this->tree->root, $friendId);

        $userConections = $user->data->getConnections();
        $userConections[] = $friendId;
        $user->data->setConnections($userConections);

        $friendConnections = $friend->data->getConnections();
        $friendConnections[] = $userId;
        $friend->data->setConnections($friendConnections);
    }
}
