<?php

namespace src\Classes\Tree;

use src\Classes\Exceptions\EmailAlreadyExistsException;
use src\Classes\Exceptions\EmailOrPasswordIsIncorrectException;
use src\Classes\Exceptions\UserNotFoundException;
use src\Classes\User;

class BinaryTree
{
    private ?Node $root;
    private array $hashTable;

    public function __construct()
    {
        $this->root = null;
        $this->hashTable = [];
    }

    public function insert(User $data): void
    {
        $newNode = new Node($data);
        if ($this->root === null) {
            $this->root = $newNode;
            $email = $this->root->data->getEmail();
            $this->hashTable[] = ["$email" => []];
        } else {
            $this->insertNode($this->root, $newNode);
        }
    }

    private function insertNode(?Node &$node, Node &$newNode): void
    {
        if ($node === null) {
            $email = $newNode->data->getEmail();
            $this->hashTable[] = ["$email" => []];
            $node = $newNode;
        } else {
            if (strcmp($newNode->data->getEmailToAtSign(), $node->data->getEmailToAtSign()) === 0) {
                throw new EmailAlreadyExistsException();
            } elseif (strcmp($newNode->data->getEmailToAtSign(), $node->data->getEmailToAtSign()) < 0) {
                $this->insertNode($node->leftChild, $newNode);
            } else {
                $this->insertNode($node->rightChild, $newNode);
            }
        }
    }

    public function getHashTable(): array
    {
        return $this->hashTable;
    }

    public function searchNodeByEmail(?Node $node, string $email): null|User
    {
        if ($node === null) {
            throw new UserNotFoundException();
        } else {
            if ($node->data->getEmail() === $email) {
                return $node->data;
            } elseif (strcmp($email, $node->data->getEmail()) < 0) {
                return $this->searchNodeByEmail($node->leftChild, $email);
            } else {
                return $this->searchNodeByEmail($node->rightChild, $email);
            }
        }
    }

    public function searchNodeByEmailAndPassword(?Node $node, string $email, string $password): null|User
    {
        if ($node === null) {
            throw new EmailOrPasswordIsIncorrectException();
        } else {
            if ($node->data->getEmail() === $email) {
                if (!$node->data->getPassword() == $password) {
                    throw new EmailOrPasswordIsIncorrectException();
                }
                return $node->data;
            } elseif (strcmp($email, $node->data->getEmail()) < 0) {
                return $this->searchNodeByEmailAndPassword($node->leftChild, $email, $password);
            } else {
                return $this->searchNodeByEmailAndPassword($node->rightChild, $email, $password);
            }
        }
    }

    public function getRoot(): ?Node
    {
        return $this->root;
    }
}
