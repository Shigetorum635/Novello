<?php

class Database
{
    public string $databaseName;
    public string $databasePassword;
    public string $databaseHost;
    public string $databaseUsername;
    public string $databaseORM;

    function __construct(string $databaseORM, string $databaseUsername = "root", string $databaseHost = "localhost", string $databaseName = "main", string $databasePassword = "rand")
    {
        $b = parse_ini_file('config.ini');

        $this->selectWorking = null;
        $this->tableWorking = null;
        $this->db = null;
        $this->dbName = $databaseName;
        $this->dbPassword = $databasePassword;
        $this->dbHost = $databaseHost;
        $this->dbUsername = $databaseUsername;
        $this->ORM = $databaseORM;
        switch ($this->ORM) {
            case "sqlite":
                try {
                    $this->db = new PDO('sqlite:database.sqlite');
                    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
                break;
            case "mysql":
                break;
            case "postgre":
                break;
        }
    }
    public function query($query, $array = false)
    {
        try {
            $stmt = $this->db->prepare($query);
            if ($array) {
                $stmt->execute($array);
            } else {
                $stmt->execute();
            }
            if (explode(' ', $query)[0] == 'SELECT') {
                return $stmt;
            }
        } catch (Exception $e) {
            die('ERROR query(): ' . $e);
        }
    }
}


$database = new Database("sqlite");
