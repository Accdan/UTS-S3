<?php 
require_once(__DIR__ . '/../domain_object/node_role3.php');

class User {
    public $KemampuanModel;
    public $role;//berisi noderole 
    //agreg
    public function __construct($human,$KemampuanModel)//
    {
        $this->role = $human;//disimpan disini
        $this->KemampuanModel = $KemampuanModel;
    }

    public function CetakUser(){
        $this->role->CetakRole();
        echo "Kemampuan: ".$this->KemampuanModel."<br>";
    }
}

class UserModel {
    public $listUser = [];

    public function AddUser($role_name, $role_description, $role_status, $Kemampuan){
        $id = count($this->listUser) + 1;
        $role = new Role($id, $role_name, $role_description, $role_status);//buat obj role
        
        $this->listUser[] = new User($role, $Kemampuan); //buat obj user role + kemampuan
    }
}
?>