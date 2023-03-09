<?php
class Database
{
    private $host = DB_HOST,
        $user = DB_USER,
        $password = DB_PASSWORD,
        $db_name = DB_NAME;

    private $dbhandler, $state;

    public function __construct()
    {
        // data source name
        $data_source_name = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbhandler = new PDO($data_source_name, $this->user, $this->password, $option);
        } catch (PDOException $error) {
            die($error->getMessage());
        }
    }

    public function query($query)
    {
        $this->state = $this->dbhandler->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->state->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->state->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->state->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->state->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->state->rowCount();
    }
}
