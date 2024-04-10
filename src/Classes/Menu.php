<?php

namespace src\Classes;

class Menu
{
    private int $options;
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
        echo "2. Buscar Conexões" . PHP_EOL;
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

    public function selectLoginOption(): void
    {
        echo "Selecione alguma opção abaixo de acordo com seu numero:" . PHP_EOL;
        $this::loginOptions();
        $this->options = fgets(STDIN);
        switch ($this->options) {
            case 1:
                $this->addFriend();
                break;
            case 2:
                $this->getConnection();
                break;
            case 3:
                $this->recommendFriends();
                break;
            case 4:
                break;
            case 5:
                $this->showProfile();
                break;
            default:
                echo "A o valor digitado deve ser entre 1 e 5" . PHP_EOL;
                break;
        }
    }

    public function selectMenuOption(): void
    {
        echo "Selecione alguma opção abaixo de acordo com seu numero:" . PHP_EOL;
        $this::menuOptions();
        $this->options = fgets(STDIN);
        switch ($this->options) {
            case 1:
                $this->login();
                break;
            case 2:
                $this->createAccount();
                break;
            default:
                echo "A o valor digitado deve ser entre 0 e 2" . PHP_EOL;
                break;
        }
    }

    private static function emailAndPass(): array
    {
        echo "Digite o seu email:";
        $email = trim(fgets(STDIN));
        echo "Digite a sua senha: ";
        $password = trim(fgets(STDIN));
        return ["email" => $email, "password" => $password];
    }

    private static function nameEmailAgeAndPass(): array
    {
        echo "Digite o seu nome:";
        $name = trim(fgets(STDIN));
        echo "Digite a sua idade:";
        $age = trim(fgets(STDIN));
        echo "Digite o seu email:";
        $email = trim(fgets(STDIN));
        echo "Digite a sua senha: ";
        $password = trim(fgets(STDIN));
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
    }

    public function addFriend()
    {

    }

    public function getConnection()
    {

    }

    public function recommendFriends()
    {

    }

    public function showProfile()
    {

    }
}
