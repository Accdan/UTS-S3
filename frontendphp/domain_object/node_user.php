<?php
require_once 'node_role.php';

class users{
    public $user_id;
    public $user_name;
    public $user_password;
    public $role_id;
    function __construct($user_id,$user_name,$user_password,$role_id){
          $this->user_id = $user_id;
          $this->user_name = $user_name;
          $this->user_password = $user_password;
          $this->role_id = $role_id;
          

    }
}

