<?php

namespace src\Classes;

class BinaryTree
{
    public ?Node $root;
    private int $allNodes;

    public function __construct()
    {
        $this->root = null;
        $this->allNodes = 0;
    }

    public function insertUser(User $data): void
    {
        $newNode = new Node($data);
        if ($this->root === null) {
            $this->root = $newNode;
        } else {
            $this->insertNode($this->root, $newNode);
        }
        $this->allNodes++;
    }

    private function insertNode(?Node &$node, Node &$newNode): void
    {
        if ($node === null) {
            $node = $newNode;
        } else {
            if ($newNode->data->getId() < $node->data->getId()) {
                $this->insertNode($node->leftChild, $newNode);
            } else {
                $this->insertNode($node->rightChild, $newNode);
            }
        }
    }

    public function generateId(): int
    {
        if ($this->allNodes == 0) {
            return 1000;
        } elseif ($this->allNodes % 2 == 0) {
            return rand(1001, 2000);
        } else {
            return rand(1, 999);
        }
    }

    public function searchNodeByID(?Node $node, int $value): null|Node
    {
        if ($node === null) {
            return null;
        } else {
            if ($node->data->getId() === $value) {
                return $node;
            } elseif ($value < $node->data->getId()) {
                return $this->searchNodeByID($node->leftChild, $value);
            } else {
                return $this->searchNodeByID($node->rightChild, $value);
            }
        }
    }

//    public function searchNodeByEmailPassword(?Node $node, string $email, string $password): null|Node
//    {
//        if ($node === null) {
//            return null;
//        } else {
//            if ($node->data->getId() === $value) {
//                return $node;
//            } elseif ($value < $node->data->getId()) {
//                return $this->searchNodeByID($node->leftChild, $value);
//            } else {
//                return $this->searchNodeByID($node->rightChild, $value);
//            }
//        }
//    }

    public function inorderTraversal(?Node $node): void
    {
        if ($node !== null) {
            $this->inorderTraversal($node->leftChild);
            echo $node->data->getId() . ". " . $node->data->getName() . PHP_EOL;
            $this->inorderTraversal($node->rightChild);
        }
    }
}
