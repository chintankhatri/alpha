<!--
author:chintan khatri
date:2016-02-07
project:alpha
-->
<?php

/**
 * class contains all database functions
 * @author chintan khatri <chintan.khatri@hotmail.com>
 */
class database {

    private $username = 'root';
    private $password = '';
    private $host = 'localhost';
    private $dbname = 'pha';
    public $db;
   

    /**
     * 
     * @author chintan khatri <chintan.khatri@hotmail.com>
     * 
     */
    public function __construct() {
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . '', $this->username, $this->password, $options);
        // return $this->db;
    }

    /**
     * function close the database connection with mysql
     */
    public function disconnect() {

        mysql_close();
    }

}

class accounts extends database {

    public function show_accounts() {
        $query = $this->db->prepare('select * from accounts');
        $query->execute();
        $row = $query->fetchAll();
        return $row;
    }

}
