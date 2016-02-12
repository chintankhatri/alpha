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

    public function debit_account($debit_amount, $ac_id) {
        $query = $this->db->prepare("update accounts set `ac_opening_balance` = `ac_opening_balance` + $debit_amount where `ac_id` ='{$ac_id}'");
        $query->execute();
    }

    public function credit_account($credit_amount, $ac_id) {
        $query = $this->db->prepare("update accounts set `ac_opening_balance` = `ac_opening_balance` - $credit_amount where `ac_id` ='{$ac_id}'");
        $query->execute();
    }

    public function get_overall_balance() {
        $query = $this->db->prepare('select sum(ac_opening_balance) from accounts');
        $query->execute();
        $row = $query->fetchColumn();
        return $row;
    }

}

class income extends database {

    public function new_income($in_date, $in_description, $in_amount, $ac_id) {
        $query = $this->db->prepare("insert into income (`in_date`, `in_description`, `in_amount`, `ac_id`) values ('{$in_date}','{$in_description}','{$in_amount}','{$ac_id}')");
        $query->execute();
    }

}

class expense extends database {

    public function new_expense($ex_date, $ex_description, $ex_amount, $ex_cat_id, $ac_id) {
        $query = $this->db->prepare("insert into expense (`ex_date`, `ex_description`, `ex_amount`, `ex_cat_id`,`ac_id`) values ('{$ex_date}','{$ex_description}','{$ex_amount}','{$ex_cat_id}','{$ac_id}')");
        $query->execute();
    }

    public function show_expense_category() {
        $query = $this->db->prepare('select * from expense_category');
        $query->execute();
        $row = $query->fetchAll();
        return $row;
    }

}

class tranfer extends database {

    public function new_transfer($ac_tr_date, $ac_tr_amount, $ac_tr_desciption, $ac_id_from, $ac_id_to) {
        $query = $this->db->prepare("insert into account_transfer (`ac_tr_date`, `ac_tr_amount`, `ac_tr_description`, `ac_id_from`, `ac_id_to`) values ('{$ac_tr_date}','{$ac_tr_amount}','{$ac_tr_desciption}','{$ac_id_from}','{$ac_id_to}')");
        $query->execute();
    }

}
