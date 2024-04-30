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
            return false;
        }
    }

    public function signUp(string $name, string $age, string $email, string $password): bool
    {
        try {
            $this->tree->insert(new User($age, $name, $email, $password));
            echo "Conta criada com sucesso" . PHP_EOL;
            $this->user = new User($age, $name, $email, $password);
            return true;
        } catch (EmailAlreadyExistsException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function showProfile(User $user): void
    {
        echo $user->getName() . "  -  " . $user->getAge() . " anos" . PHP_EOL;
        echo "-----------------------------" . PHP_EOL;
        echo "email: " . $user->getEmail() . PHP_EOL;
        echo "Amizades: ----------------" . PHP_EOL;

        $this->showFriends($user);
    }

    public function addFriend(string $friendEmail): void
    {
        try {
            if($this->user->getEmail() != $friendEmail) {
                $friend = $this->tree->searchNodeByEmail($this->tree->getRoot(), $friendEmail);
                $hashTable = $this->tree->getHashTable();
                $hashTable[$this->user->getEmail()][] = $friendEmail;
                $hashTable[$friendEmail][] = $this->user->getEmail();
                $this->user->setConnections($hashTable[$this->user->getEmail()]);
                $friend->setConnections($hashTable[$friendEmail]);
                $this->tree->setHashTable($hashTable);
                echo PHP_EOL;
                echo "Amigo adicionado com sucesso" . PHP_EOL;
            } else {
                echo "Você não pode adicionar a si mesmo como amigo" . PHP_EOL;
            }
        } catch (UserNotFoundException $e) {
            echo $e->getMessage();
        }
    }
    public function deleteFriend(string $friendEmail): void
    {
        try {
            if($this->user->getEmail() != $friendEmail) {
                $friend = $this->tree->searchNodeByEmail($this->tree->getRoot(), $friendEmail);
                $hashTable = $this->tree->getHashTable();
               $key = array_search($friendEmail, $hashTable[$this->user->getEmail()]);
               if($key !== false){
                   unset($hashTable[$this->user->getEmail()][$key]);
                   unset($hashTable[$friendEmail][$this->user->getEmail()]);
               }else{
                   return;
               }
                $this->user->setConnections($hashTable[$this->user->getEmail()]);
                $friend->setConnections($hashTable[$friendEmail]);
                $this->tree->setHashTable($hashTable);
                echo PHP_EOL;
                echo "Amigo deletado com sucesso" . PHP_EOL;
            } else {
                echo "Você não pode se auto deletar" . PHP_EOL;
            }
        } catch (UserNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function searchRecommendation(): ?array
    {
        $myConnection = $this->user->getConnections();
        $allConnections = [];
        foreach ($myConnection as $connection) {
            try {
                $conn = $this->tree->searchNodeByEmail($this->tree->getRoot(), $connection);
                if(count($conn->getConnections()) > 0){
                    foreach ($conn->getConnections() as $friendConn){
                        if(!in_array($friendConn, $allConnections) && $friendConn !== $this->user->getEmail() && !in_array($friendConn, $this->user->getConnections())){
                            $allConnections[] = $friendConn;
                        }
                    }
                }
            } catch (UserNotFoundException $e) {
            }
        }
        return $allConnections;
    }

    public function showFriends(User $user): void {
        $hashTable = $this->tree->getHashTable();

        if (key_exists($user->getEmail(), $hashTable) && $hashTable[$user->getEmail()]) {
            foreach ($hashTable[$user->getEmail()] as $key=>$friends) {
                echo $key+1 . " - $friends" . PHP_EOL;
            }
        } else {
            echo "Você nao possui amigos adicionados!" . PHP_EOL;
        }
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
}
