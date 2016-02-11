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
     * function connection with mysql
     */
    public function __construct() {
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . '', $this->username, $this->password, $options);
    }

}

/**
 * @author chintan khatri <chintan.khatri@hotmail.com>
 * extended class of database perform functions on accounts 
 */
class accounts extends database {

    public function show_accounts() {
        $query = $this->db->prepare('select * from accounts');
        $query->execute();
        $row = $query->fetchAll();
        return $row;
    }

    public function debit_account($debit_amount,$ac_id) {
        $query = $this->db->prepare("update accounts set `ac_opening_balance` = `ac_opening_balance` + '.$debit_amount.' where `ac_id` ='{$ac_id}'");
        $query->execute();
    }

}

class income extends database {

    public function new_income($in_date, $in_description, $in_amount, $ac_id) {
        $query = $this->db->prepare("insert into income (`in_date`, `in_description`, `in_amount`, `ac_id`) values ('{$in_date}','{$in_description}','{$in_amount}','{$ac_id}')");
        $query->execute();
    }

}
