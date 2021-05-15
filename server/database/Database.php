<?php

/**
 * Database structure thanks to Vistora team.
 */
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
                    $this->db = new PDO('sqlite:database.db');
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

    public function getScalar($sql, $params)
    {
        if ($stmt = $this->db->prepare($sql)) {

            $stmt->execute($params);

            return $stmt->fetchColumn();
        } else
            return 0;
    }

    public function getRow($sql, $params)
    {
        if ($stmt = $this->db->prepare($sql)) {

            $stmt->execute($params);

            return $stmt->fetch();
        } else
            return 0;
    }

    public function getSet($sql, $params)
    {
        if ($stmt = $this->db->prepare($sql)) {

            $stmt->execute($params);

            return $stmt->fetchAll();
        } else
            return 0;
    }

    function executeSQL($sql, $params)
    {
        if ($stmt = $this->db->prepare($sql)) {

            $stmt->execute($params);

            return $stmt->rowCount();
        } else
            return false;
    }
}


$database = new Database("sqlite");
