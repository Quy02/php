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
            exit;
        }

        return $connection;
    }

    // Function executes the query statement
    public function query_execute($queryString)
    {
        // Initiate connection
        $connection = $this->connect();

        $result = $connection->query($queryString);

        if ($result === false) {
            echo "Query execution failed: " . $connection->error;
            $connection->close();
            exit;
        }

        $connection->close();
        return $result;
    }

    // Function returns an array of result lists
    public function select_to_array($queryString)
    {
        $rows = array();
        $result = $this->query_execute($queryString);

        if ($result === false) {
            return false;
        }

        // Loop through the result set and fetch each row as an associative array
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }

        return $rows;
    }
}
?>
