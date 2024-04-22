<?php

namespace src\Classes;

class Menu
{
    private string $options;
    private SocialNetwork $socialNetwork;

    public function __construct()
    {
        $this->options = -1;
        $this->socialNetwork = new SocialNetwork();
    }

    private static function menuOptions(): void
    {
        echo "Selecione a opção de acordo com numero" . PHP_EOL;
        echo "1. Adicionar Amigo" . PHP_EOL;
        echo "2. Exibir meus Amigos" . PHP_EOL;
        echo "3. Recomendações de Amigos" . PHP_EOL;
        echo "4. Visualizar Perfil" . PHP_EOL;
        echo "5. Sair" . PHP_EOL;
    }

    private static function loginOptions(): void
    {
        echo "1. Fazer login" . PHP_EOL;
        echo "2. Criar conta" . PHP_EOL;
        echo "0. Sair" . PHP_EOL;
    }

    public function selectMenuOption(): void
    {
        while (true) {
            echo PHP_EOL;
            echo "Selecione alguma opção abaixo de acordo com seu numero:" . PHP_EOL;
            $this::menuOptions();
            $this->options = fgets(STDIN);
            if ($this->options == "5") {
                break;
            }
            switch ($this->options) {
                case "1":
                    $this->addFriend();
                    break;
                case "2":
                    $this->getConnection();
                    break;
                case "3":
                    $this->recommendFriends();
                    break;
                case "4":
                    $this->showProfile();
                    break;
                default:
                    echo PHP_EOL . "A o valor digitado deve ser entre 1 e 5" . PHP_EOL;
                    break;
            }
        }
    }

    public function selectLoginOption(): void
    {
        while (true) {
            echo "Selecione alguma opção abaixo de acordo com seu numero:" . PHP_EOL;
            $this::loginOptions();
            $this->options = fgets(STDIN);
            if ($this->options == "0") {
                break;
            }
            switch ($this->options) {
                case "1":
                    $this->login();
                    break;
                case "2":
                    $this->createAccount();
                    break;
                default:
                    echo PHP_EOL . "A o valor digitado deve ser entre 0 e 2" . PHP_EOL;
                    break;
            }
        }
    }

    private static function emailAndPass(): array
    {
        echo PHP_EOL;
        echo "Digite o seu email:";
        $email = trim(fgets(STDIN));
        echo "Digite a sua senha: ";
        $password = trim(fgets(STDIN));
        echo PHP_EOL;
        return ["email" => $email, "password" => $password];
    }

    private static function nameEmailAgeAndPass(): array
    {
        echo PHP_EOL;
        echo "Vamos criar a sua conta, preeencha os valores nos campos abaixo" . PHP_EOL;
        echo "Digite o seu nome:";
        $name = trim(fgets(STDIN));
        echo "Digite a sua idade:";
        $age = trim(fgets(STDIN));
        echo "Digite o seu email:";
        $email = trim(fgets(STDIN));
        echo "Digite a sua senha: ";
        $password = trim(fgets(STDIN));
        echo PHP_EOL;
        return ["name" => $name, "age" => $age, "email" => $email, "password" => $password];
    }

    public function createAccount(): void
    {
        $data = self::nameEmailAgeAndPass();
        $success = $this->socialNetwork->signUp($data['name'], intval($data['age']), $data['email'], $data['password']);
        while (!$success) {
            echo "Preencha os campos novamente" . PHP_EOL;
            $data = self::nameEmailAgeAndPass();
            $success = $this->socialNetwork->signUp($data['name'], intval($data['age']), $data['email'], $data['password']);
        }
        $this->selectMenuOption();
    }

    public function login(): void
    {
        $data = self::emailAndPass();
        $success = $this->socialNetwork->signIn($data['email'], $data['password']);
        while (!$success) {
            echo "Preencha os campos novamente" . PHP_EOL;
            $data = self::emailAndPass();
            $success = $this->socialNetwork->signIn($data['email'], $data['password']);
        }
        $this->selectMenuOption();
    }

    public function addFriend(): void
    {
        echo "Digite o email do seu amigo: " . PHP_EOL;
        $email = trim(fgets(STDIN));
        $this->socialNetwork->addFriend($email);
    }

    public function getConnection()
    {
        echo PHP_EOL;
        $usr = $this->socialNetwork->getUser();
        $this->socialNetwork->showFriends($usr);
    }

    public function recommendFriends(): void
    {
        $recommends = $this->socialNetwork->searchRecommendation();
    }

    public function showProfile(): void
    {
        
        $this->socialNetwork->showProfile($this->socialNetwork->getUser());
    }
}
