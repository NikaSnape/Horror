<?php
class DbConnection {

    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DB_NAWME = 'halloween';
    const TABLE_NAME = 'kalambury';

    public function getConnectDb()
    {
        $connection = mysqli_connect(self::HOST, self::USER, self::PASSWORD, self::DB_NAWME);
        $connection->set_charset("utf8");

        if ($connection->connect_error) {
            echo("Problem z polaczeniem: " . $connection->connect_error);
        }
        return $connection;
    }

    public function closeDbConnection()
    {
        $this->getConnectDb()->close();
    }
}