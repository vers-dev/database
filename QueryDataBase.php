<?php


class QueryDataBase
{
    private $link; // Здесь храниться результат подлючения PDO

    // Вызываем функцию connect()
    function __construct()
    {
        $this->connect();
    }

    // Подключаемся к Базе Данных
    private function connect()
    {
        // Пытаемся
        try {
            // Переменные для формирования PDO запроса
            $host = "z-go.ru";
            $dbname = "9172350836_z54";
            $username = "046446404_z54";
            $password = "dUbKk7qX7;qQ";
            // Готовый DSN запрос
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8;";

            $this->link = new PDO($dsn, $username, $password);
            $this->link->exec("SET NAMES utf8");
            return $this; // Возвращаем PDO

        } catch (PDOException $err) { // Отлавливаем ошибку
            die("Ошибка выполнения скрипта: " . $err->getMessage());
        }
    }

    public function getData($sql)
    {
        $statement = $this->link->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll(PDO::FETCH_ASSOC);

        if($res == ""){
            $res = [];
        }

        return $res;
    }

    public function query($sql){
        $statement = $this->link->prepare($sql);
        $statement->execute();
    }
}