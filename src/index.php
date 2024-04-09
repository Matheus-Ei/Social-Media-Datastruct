<?php

use src\Classes\Exceptions\EmailAlreadyExistsException;
use src\Classes\Exceptions\EmailOrPasswordIsIncorrectException;
use src\Classes\Exceptions\UserNotFoundException;
use src\Classes\Menu\LoginMenu;
use src\Classes\Tree\BinaryTree;
use src\Utils\Utils;

require '../vendor/autoload.php';

$tree = new BinaryTree();
$utils = new Utils();
$utils->createUsersInTree($tree);

try {
    var_dump($tree->searchNodeByEmail($tree->getRoot(), "alexandre@gmail.com"));
} catch (UserNotFoundException $e) {
    echo $e->getMessage();
}

try {
    var_dump($tree->searchNodeByEmailAndPassword($tree->getRoot(), "julia123@gmail.com", "123456"));
} catch (EmailOrPasswordIsIncorrectException $e) {
    echo $e->getMessage();
}


var_dump($tree->getHashTable());