<?php

namespace models {
    class User
    {
        //Properties
        public $id;
        public $username;
        public $email;
        public $password;
        public $name;
        public $surname;

        // Constructor
        function __construct($id, $username, $email, $password, $name, $surname)
        {
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->name = $name;
            $this->surname = $surname;
        }

        // Methods

        #region Getters and Setters
        // getters and setters
        function get_id() : int {
            return $this->id;
        }

        function set_id($value) {
            $this->id = $value;
        }

        function get_username() : string {
            return $this->username;
        }
            
        function set_username($value) {
            $this->username = $value;
        }

        function get_email() : string {
            return $this->email;
        }

        function set_email($value) {
            $this->email = $value;
        }

        function set_password($value) {
            $this->password = $value;
        }

        function get_name() : string {
            return $this->name;
        }

        function set_name($value) {
            $this->name = $value;
        }

        function get_surname() : string {
            return $this->surname;
        }

        function set_surname($value) {
            $this->surname = $value;
        }
        #endregion
    }
}
