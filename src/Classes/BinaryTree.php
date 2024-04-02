<?php

namespace src\Classes;

class BinaryTree
{
    public ?Node $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function insertUser(User $data): void
    {
        $newNode = new Node($data);
        if ($this->root === null) {
            $this->root = $newNode;
        } else {
            $this->insertNode($this->root, $newNode);
        }
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

    public static function generateId(): int
    {
        return rand(0, 1000);
    }

    public function searchNode(?Node $node, int $value): null|Node
    {
        if ($node === null) {
            return null;
        } else {
            if ($node->data->getId() === $value) {
                return $node;
            } elseif ($value < $node->data->getId()) {
                return $this->searchNode($node->leftChild, $value);
            } else {
                return $this->searchNode($node->rightChild, $value);
            }
        }
    }

    public function inorderTraversal($node): void
    {
        if ($node !== null) {
            $this->inorderTraversal($node->leftChild);
            var_dump($node->data);
            $this->inorderTraversal($node->rightChild);
        }
    }
}
