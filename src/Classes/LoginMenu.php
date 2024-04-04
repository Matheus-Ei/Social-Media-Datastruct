<?php

namespace src\Classes;

use src\Interfaces\Menu;

class LoginMenu implements Menu
{

    private int|string|null $option;
    private SocialNetwork $socialNetwork;

    public function __construct()
    {
        $this->option = -1;
        $this->socialNetwork = new SocialNetwork();
    }
    public function menuOptions(): void
    {
        echo "1. Fazer login" . PHP_EOL;
        echo "2. Criar conta". PHP_EOL;
        echo "0. Sair". PHP_EOL;
    }

    public function selectOption(): void
    {
        while ($this->option != 0) {
            $this->menuOptions();
            $this->option = trim(fgets(STDIN));
            while(!is_numeric($this->option) || $this->option >2 || $this->option <0){
                echo "O valor tem que ser um numero entre 0 e 7" . PHP_EOL;
                $this->option = trim(fgets(STDIN));
            }
            if ($this->option == 0) break;
            switch ($this->option) {
                case 1:
                    $this->socialNetwork->createAccount();
                    break;
            }
        }
    }

}
