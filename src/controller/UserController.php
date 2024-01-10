<?php

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once(__DIR__ . '/../model/User.php');

class UserController
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function handleRequest()
    {


        // create a log channel
        $logger = new Logger('logger');
        $logger->pushHandler(new StreamHandler('logger.log', Level::Warning));

        // add records to the log
        $logger->warning("[\$_GET] - " . json_encode($_GET) . " | [\$_SESSION] - " . json_encode($_SESSION) . "[\$_SERVER] - " . json_encode($_SERVER));

        $action = isset($_GET['action']) ? $_GET['action'] : null;
        if ($action === 'login') {
            $this->login();
        } elseif ($action === 'register') {
            $this->register();
        } elseif ($action === 'welcome') {
            $this->welcome();
        } elseif ($action === 'logout') {
            $this->logout();
        } elseif (is_null($action)) {
            $this->home();
        } else {
            throw new InvalidArgumentException('Page for ' . $action . ' was not found!');
        }
    }
    public function login(): void
    {
        if (isset($_POST['submit'])) {
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;
            $username = $this->user->login($email, $password);
            $_SESSION['username'] = $username;
            $this->redirect('index.php?action=welcome');
        }
        require(__DIR__ . '/../view/login.php');
    }
    public function register(): void
    {
        if (isset($_POST['submit'])) {
            $username = isset($_POST['username']) ? $_POST['username'] : null;
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;
            $password_verif = isset($_POST['password_verif']) ? $_POST['password_verif'] : null;
            $this->user->register($username, $email, $password, $password_verif);
            $this->redirect('index.php?action=login');
        }
        require(__DIR__ . '/../view/register.php');
    }
    public function logout(): void
    {
        session_destroy();
        $this->redirect('index.php');
    }
    public function welcome(): void
    {
        if(array_key_exists('username', $_SESSION)) {
            require(__DIR__ . '/../view/welcome.php');
        } else {
            require(__DIR__ . '/../view/login.php');
        }
    }
    public function home(): void
    {
        require(__DIR__ . '/../view/home.php');
    }
    private function redirect($location): void
    {
        header('Location: ' . $location);
    }
}
