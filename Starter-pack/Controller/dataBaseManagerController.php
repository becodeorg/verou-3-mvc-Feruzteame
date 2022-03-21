<?php

class DatabaseManager
{
    // These are private: only this class needs them
    private string $host;
    private string $user;
    private string $password;
    private string $dbname;


    public PDO $connection;

    public function __construct(string $host, string $user, string $password, string $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect(): void
    {
        try{
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->connection = new PDO($dsn, $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "DataBase successfully connect!";
        }
        catch (PDOException $exception){
            echo "message ", $exception->getMessage();
            echo "<br>code ", $exception->getCode();
            echo "<br>file ", $exception->getFile();
            echo "<br>line ", $exception->getLine();
        }

    }
}