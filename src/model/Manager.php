<?php

class Manager
{
    protected $db;

    protected function getDb(): \PDO
    {
        $ini = array();
        $keys_to_check = array("db_host", "db_port", "db_name", "db_user", "db_password");
        #check if app.ini present and has all the required fields
        $appIni = __DIR__ . '/../app.ini';
        if (!file_exists($appIni)) {
            throw new UnexpectedValueException('app.ini file missing');
        } else {
            $ini = parse_ini_file($appIni);
        }

        foreach ($keys_to_check as $key) {
            if (!array_key_exists($key, $ini)) {
                throw new UnexpectedValueException('app.ini missing ' . $key);
            }
        }

        $host = $ini['db_host'];
        $port = $ini['db_port'];
        $db_name = $ini['db_name'];
        $user = $ini['db_user'];
        $password = $ini['db_password'];

        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        $this->db = new PDO(
            'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $db_name . ';',
            $user,
            $password,
            $options
        );

        return $this->db;
    }
}
