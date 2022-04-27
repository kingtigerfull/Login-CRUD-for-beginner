<?php
include_once('customers.php');

class User extends Customers {

    public function __construct(){

        parent::__construct();
    }

    public function check_login($username, $password){

        $sql = "SELECT * FROM customers WHERE username = '$username' AND password = '$password'";
        $query = $this->con->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }

    }

    public function details($sql){

        $query = $this->con->query($sql);

        $row = $query->fetch_array();

        return $row;
    }

    public function escape_string($value){

        return $this->con->real_escape_string($value);
    }
}

?>
