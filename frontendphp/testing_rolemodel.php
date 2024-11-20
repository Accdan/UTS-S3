<?php
session_start();
require_once 'model_role/role_model.php';


$obj_role = new modelRole();


echo "Displaying all roles:" . "<br>";
foreach ($obj_role->getAllRoles() as $role) {
    echo "Role ID: " . $role->role_id . "<br>";
    echo "Role Name: " . $role->role_name . "<br>";
    echo "Role Description: " . $role->role_description . "<br>";
    echo "Role Status: " . $role->role_status . "<br>";
}


echo "<br>Add new roles session:<br>";
$obj_role->addRole("new role", "test", 1);
$obj_role->addRole("new role 2", "test 2", 2);


echo "<br>Displaying roles after addition:<br>";
foreach ($obj_role->getAllRoles() as $role) {
    echo "Role ID: " . $role->role_id . "<br>";
    echo "Role Name: " . $role->role_name . "<br>";
    echo "Role Description: " . $role->role_description . "<br>";
    echo "Role Status: " . $role->role_status . "<br>";
}


echo "<br>Default data roles:<br>";
foreach ($obj_role->getAllRoles() as $role) {
    echo "Role ID: " . $role->role_id . "<br>";
    echo "Role Name: " . $role->role_name . "<br>";
    echo "Role Description: " . $role->role_description . "<br>";
    echo "Role Status: " . $role->role_status . "<br>";
}


echo "<br>Update role session:<br>";
$obj_role->updateRole(1, "Aya", "Virtual Gf", 2);
$obj_role->updateRole(2, "Rudi", "Fiction Name", 2);


echo "<br>Displaying roles after update:<br>";
foreach ($obj_role->getAllRoles() as $role) {
    echo "Role ID: " . $role->role_id . "<br>";
    echo "Role Name: " . $role->role_name . "<br>";
    echo "Role Description: " . $role->role_description . "<br>";
    echo "Role Status: " . $role->role_status . "<br>";
}


echo "<br>Delete role session:<br>";
$obj_role->deleteRole(1);


echo "<br>Displaying roles after deletion:<br>";
foreach ($obj_role->getAllRoles() as $role) {
    echo "Role ID: " . $role->role_id . "<br>";
    echo "Role Name: " . $role->role_name . "<br>";
    echo "Role Description: " . $role->role_description . "<br>";
    echo "Role Status: " . $role->role_status . "<br>";
}
?>
