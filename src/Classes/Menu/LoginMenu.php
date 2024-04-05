<?php

namespace src\Classes\Menu;


class LoginMenu
{
    public function menuOptions(): void
    {
        echo "1. Fazer login" . PHP_EOL;
        echo "2. Criar conta" . PHP_EOL;
        echo "0. Sair" . PHP_EOL;
    }
}
