<?php
class Db
{
    // Database connection variable
    protected static $connection;

    // Connection initialization function
    public function connect()
    {
        $connection = mysqli_connect("localhost", "root", "", "demo_lap3");

        mysqli_set_charset($connection, 'utf8');

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Database connection failed: " . mysqli_connect_error();
            return null; // return null on connection failure
        }

        self::$connection = $connection; // store connection in static variable
        return $connection;
    }

    // The function executes the query statement
    public function query_execute($queryString)
    {
        // Initiate connection
        $connection = $this->connect();
        if (!$connection) return false; // return false if connection fails

        // Execute query execution, query is a method of mysqli library
        $result = $connection->query($queryString);
        $connection->close();
        return $result;
    }

    // The implementation function returns an array of result lists
    public function select_to_array($queryString)
    {
        $rows = array();
        $result = $this->query_execute($queryString);
        if ($result === false) return false;

        // Loop through results and fetch them into an array
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }
        return $rows;
    }
}
?>