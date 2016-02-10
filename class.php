<!--
author:chintan khatri
date:2016-02-07
project:alpha
-->
<?php

class database {

    private $username = 'root';
    private $password = '';
    private $host = 'localhost';
    private $dbname = 'pha';
    
    public function connect() {
        $db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.'', $this->username, $this->password);
        return $db;
    }
    
}
?>
