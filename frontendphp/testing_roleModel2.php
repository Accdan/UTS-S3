<?php 
require_once "model_role/role_model2.php";

$obj_role = [];
$obj_role[] = new User(1,"Bill","DEMON", 1 ,"Manipulator");
$obj_role[] = new User(2,"James Sunderland","Crazy", 1 ,"Lying Figure");
$obj_role[] = new User(3,"SI anu","DPR", 0 ,"Corruption");

    foreach($obj_role as $roles){
    echo "ID Role: ".$roles->role_id."<br>";
    echo "Nama Role: ".$roles->role_name."<br>";
    echo "Description Role: ".$roles->role_description."<br>";
    echo "status Role: ".$roles->role_status."<br>";
    echo $roles->user()."<br>";
    echo "<br>";
    }

?>