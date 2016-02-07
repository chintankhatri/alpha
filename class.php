<!--
author:chintan khatri
date:2016-02-07
project:alphabet
-->
<?php

class database {

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'alpha';

    public function connect() {

        mysql_connect($this->host, $this->user, $this->password) or die(mysql_error());
        mysql_select_db($this->database) or die(mysql_error());
    }

}

?>
