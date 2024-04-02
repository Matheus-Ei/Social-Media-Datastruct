<?php
require '../vendor/autoload.php';

use src\Classes\BinaryTree;
use src\Classes\SocialNetwork;
use src\Classes\User;


$redeSocial = new SocialNetwork();

$redeSocial->createUser();
$redeSocial->createUser();
$redeSocial->createUser();
$redeSocial->createUser();

$redeSocial->showUsers();


echo "Digite o valor do user id: ";
$userId = fgets(STDIN);
echo "Digite o valor do friend id: ";
$friendId = fgets(STDIN);

$redeSocial->addFriendship($userId, $friendId);

echo "Amizade feita com sucesso";


echo "Inorder traversal: ";
$redeSocial->showUsers();

