<?php

namespace src\Classes;

use src\Classes\Exceptions\EmailAlreadyExistsException;
use src\Classes\Exceptions\EmailOrPasswordIsIncorrectException;
use src\Classes\Exceptions\UserNotFoundException;
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
            echo "Login realizado com sucesso" . PHP_EOL;
            $this->util::pressEnter();
            return true;
        } catch (EmailOrPasswordIsIncorrectException $e) {
            echo $e->getMessage();
            $this->util::pressEnter();
            return false;
        }
    }


    public function signUp(string $name, string $age, string $email, string $password): bool
    {
        try {
            $this->tree->insert(new User($age, $name, $email, $password));
            echo "Conta criada com sucesso" . PHP_EOL;
            $this->user = new User($age, $name, $email, $password);
            $this->util::pressEnter();
            return true;
        } catch (EmailAlreadyExistsException $e) {
            echo $e->getMessage();
            $this->util::pressEnter();
            return false;
        }
    }

    public function showProfile(User $user): void
    {
        echo $user->getName() . "  -  " . $user->getAge() . " anos" . PHP_EOL;
        echo "-----------------------------" . PHP_EOL;
        echo "email: " . $user->getEmail() . PHP_EOL;
        echo "Amizades: ----------------" . PHP_EOL;
        $hashTable = $this->tree->getHashTable();

        if ($hashTable[$user->getEmail()]) {
            $count = 1;
            foreach ($hashTable[$user->getEmail()] as $friends) {
                echo $count . " - $friends" . PHP_EOL;
            }
        } else {
            echo "Você nao possui amigos adicionados!" . PHP_EOL;
        }
    }

    public function addFriend(string $friendEmail): void
    {
        try {
            $friend = $this->tree->searchNodeByEmail($this->tree->getRoot(), $friendEmail);
            $hashTable = $this->tree->getHashTable();
            $hashTable[$this->user->getEmail()][] = $friendEmail;
            $hashTable[$friendEmail][] = $this->user->getEmail();
            $this->tree->setHashTable($hashTable);
            echo PHP_EOL;
            echo "Amigo adicionado com sucesso" . PHP_EOL;
            $this->util::pressEnter();
        } catch (UserNotFoundException $e) {
            echo $e->getMessage();
            $this->util::pressEnter();
        }
    }

    public function searchRecommendation(): void
    {

    }

    public function getUser(): ?User
    {
        return $this->user;
    }
}
