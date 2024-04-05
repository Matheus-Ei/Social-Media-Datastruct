<?php

namespace src\Classes\Menu;


class ConnectMenu
{
    public function menuOptions(): void
    {
        echo "Selecione a opção de acordo com numero" . PHP_EOL;
        echo "1. Adicionar Amigo" . PHP_EOL;
        echo "2. Buscar Conexões" . PHP_EOL;
        echo "3. Recomendações de Amigos" . PHP_EOL;
        echo "4. Visualizar Perfil" . PHP_EOL;
        echo "5. Sair" . PHP_EOL;
    }

}
