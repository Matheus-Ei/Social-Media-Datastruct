<?php

namespace src\Classes;

use src\Interfaces\Menu;

class ConnectMenu implements Menu
{

    private int|string|null $option;
    private SocialNetwork $socialNetwork;

    public function __construct()
    {
        $this->option = 0;
        $this->socialNetwork = new SocialNetwork();
    }


    public function menuOptions(): void
    {
        echo "Selecione a opção de acordo com numero" . PHP_EOL;
        echo "1. Cadastro de Usuário" . PHP_EOL;
        echo "2. Adicionar Amigo" . PHP_EOL;
        echo "3. Buscar Conexões" . PHP_EOL;
        echo "4. Recomendações de Amigos" . PHP_EOL;
        echo "5. Visualizar Perfil" . PHP_EOL;
        echo "6. Vizualizar todos usuarios" . PHP_EOL;
        echo "7. Sair" . PHP_EOL;
    }

    public function selectOption(): void
    {
        while ($this->option != 7) {
            $this->menuOptions();
            $this->option = trim(fgets(STDIN));
            while(!is_numeric($this->option) || $this->option >7 || $this->option <0){
                echo "O valor tem que ser um numero entre 0 e 7" . PHP_EOL;
                $this->option = trim(fgets(STDIN));
            }
            if ($this->option == 7) break;
            switch ($this->option) {
                case 1:
                    $this->socialNetwork->createAccount();
                    break;
                case 2:
                    $this->socialNetwork->addFriendship();
                    break;
                case 6:
                    $this->socialNetwork->showUsers();
                    break;
            }
        }
    }

}
