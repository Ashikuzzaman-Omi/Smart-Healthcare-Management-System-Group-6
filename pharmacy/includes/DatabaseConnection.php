<?php
// includes/DatabaseConnection.php
// Class-based structure, similar to what was shown in class.
// openConnection() returns a mysqli object used with prepared
// statements everywhere else in the app, so SQL injection is not possible.

class DatabaseConnection
{
    public function openConnection()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $host   = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "hospital_management_system";

        try {
            $connection = mysqli_connect($host, $dbuser, $dbpass, $dbname);
            $connection->set_charset("utf8mb4");
            return $connection;
        } catch (mysqli_sql_exception $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }
}