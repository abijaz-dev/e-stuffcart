<?php

    class Database {
        // Properties
        private $host    = "localhost";
        private $user    =  "root";
        private $pwd     = "";
        private $db_name = "estuffcart";

        // methods - connect to db
        public function connect() {
            
            try {
            $dsn  = "mysql:host=". $this->host .";dbname=" . $this->db_name;
            $pdo = new PDO( $dsn, $this->user, $this->pwd );
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (Exceptioin $e) {
            die ( "Error" . $e->getMessage() ) ;
        }
        return $pdo;
        }
    }