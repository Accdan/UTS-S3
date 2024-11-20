<?php 
 
require_once "model_role/role_model4.php";
$model = new UserModel();//menyimpan beberapa user



$model->AddUser("Botak", "Enemies", 7, "MANIpulasi");
$model->AddUser("Jenggot", "Enemies", 7, "MANIpulasi");
$model->AddUser("Botak", "Enemies", 7, "MANIpulasi");





//testing role4
foreach  ($model->listUser as $role) {
    $role->CetakUser();
    echo "<br>";
}

?>