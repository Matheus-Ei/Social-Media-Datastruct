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
        }
    }

    public function createAccount()
    {

    }

    public function login(): void
    {
        echo "Digite o seu email:";
        $email = trim(fgets(STDIN));
        echo "Digite a sua senha: ";
        $password = trim(fgets(STDIN));
        $this->socialNetwork->signIn($email, $password);
    }

    public function addFriend()
    {

    }
}
