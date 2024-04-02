<?php

namespace src\Classes;

class SocialNetwork
{
    private BinaryTree $tree;

    public function __construct()
    {
        $this->tree = new BinaryTree();
    }

    public function createUser(): void
    {
        echo "Digite o seu nome: ";
        $nome = trim(fgets(STDIN));
        echo "Digite a sua idade: ";
        $idade = trim(fgets(STDIN));
        $this->tree->insertUser(new User($idade, $nome, $this->tree::generateId()));
    }

    public function showUsers(): void
    {
        $this->tree->inorderTraversal($this->tree->root);
    }

    public function addFriendship(int $userId, int $frinedId): void
    {
        $user = $this->tree->searchNode($this->tree->root, $userId);
        $friend = $this->tree->searchNode($this->tree->root, $frinedId);

        $userConections = $user->data->getConnections();
        $userConections[] = $frinedId;
        $user->data->setConnections($userConections);

        $friendConnections = $friend->data->getConnections();
        $friendConnections[] = $userId;
        $friend->data->setConnections($friendConnections);
    }
}
