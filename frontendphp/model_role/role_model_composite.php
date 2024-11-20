<?php
require_once 'domain_object/node_role.php';
class modelRole{
    private $role = [];
    private $nextId = 1;
public function addRole($role_id, $role_name, $role_description ,$role_status){
    $peran = new Role ($this->nextId++,$role_name,$role_description,$role_status);
    $this->role[] = $peran;
    $this->saveToSession();
}
public function saveToSession(){
    $_SESSION['roles'] = serialize($this->role);
}

public function getAllRoles(){
    return $this->role;
}

public function initialiazeDefaultRole(){
    $this->addRole(1,"admin" ,"ikan" , 07);
    $this->addRole(1,"admin" ,"ikan" , 07);
    $this->addRole(1,"admin" ,"ikan" , 07);
}

}
?>