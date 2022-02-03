<?php

namespace database {

    use mysqli;

    class connection
    {
        public $servername = "localhost";
        public $username = "root";
        public $password = "1234";
        public $database = "challange";

        public function start_connection()
        {
            // creates db connection
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

            // checks connection state
            if ($conn->connect_error) {
                die("Failed to connect to database. Please try again later! " . $conn->connect_error);
                return null;
            }

            return $conn;
        }
    }
}
