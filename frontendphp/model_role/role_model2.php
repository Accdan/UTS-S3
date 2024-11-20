<?php 
require_once(__DIR__ . '/../domain_object/node_role.php');

class User extends Role{
    public $Kemampuan;
    //inher
    function __construct($role_id, $role_name, $role_description, $role_status, $Kemampuan)
    { 
            // $this->role_id = $role_id;
            // $this->role_name = $role_name;
            // $this->role_description = $role_description;
            // $this->role_status = $role_status;
            parent::__construct($role_id, $role_name, $role_description, $role_status);
            $this->Kemampuan = $Kemampuan;
    }

    public function user(){
        return "Kemampuan: " . $this->Kemampuan;
    }
}


?>