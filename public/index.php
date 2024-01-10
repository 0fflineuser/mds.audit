<?php

require __DIR__ . '/../vendor/autoload.php';

session_start();


require(__DIR__ . '/../src/controller/UserController.php');

try {
    $userController = new UserController();
    $userController->handleRequest();
} catch (PDOException $e) {
    //catch duplicate exceptions
    $errorMessage = '';
    if ($e->errorInfo[1] == 1062) {
        if (strpos($e->errorInfo[2], 'username')) {
            $errorMessage = 'Username already taken';
        } else if (strpos($e->errorInfo[2], 'email')) {
            $errorMessage = 'Email already taken';
        }
    } else {
        $errorMessage = $e->getMessage();
    }
    require(__DIR__ . '/../src/view/errorView.php');
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require(__DIR__ . '/../src/view/errorView.php');
}
