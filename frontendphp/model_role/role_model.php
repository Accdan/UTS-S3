<?php
// require_once 'domain_object/node_role.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontendphp/domain_object/node_role.php';


class ModelRole
{
    private $roles = [];
    private $nextId = 1;

    public function __construct()
    {
        // Pastikan sesi sudah dimulai di awal sebelum memanggil kelas ini
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Cek apakah 'roles' sudah ada dalam sesi dan valid
        if (isset($_SESSION['roles'])) {
            $storedRoles = unserialize($_SESSION['roles']);
            if ($storedRoles !== false) { // Jika unserialize berhasil
                $this->roles = $storedRoles;
                $this->nextId = isset($_SESSION['lastroleid']) ? $_SESSION['lastroleid'] + 1 : 1 ;
            } else {
                // Inisialisasi ulang jika unserialize gagal
                $this->initializeDefaultRole();
                $this->nextId=4;
            }
        } else {
            $this->initializeDefaultRole();
        }
    }

    private function getLastid(){
        
    }

    public function initializeDefaultRole()
    {
        $this->addRole("Admin", "Administrator", 1);
        $this->addRole("Super Admin", "Super Admin", 1);
        $this->addRole("User", "Customer/member", 1);
        $this->addRole("Kasir", "Pembayaran", 1);
    }

    public function addRole($role_name, $role_description, $role_status)
    {
        $role = new role($this->nextId, $role_name, $role_description, $role_status);
        $this->roles[] = $role;
        $_SESSION['lastroleid'] = $this->nextId;
        $this->nextId++;

        $this->saveToSession();
    }

    private function saveToSession()
    {
        $_SESSION['roles'] = serialize($this->roles);
    }

    public function getAllRoles()
    {
        return $this->roles;
    }

    public function getRoleById($role_id)
    {
        foreach ($this->roles as $role) {
            if ($role->role_id == $role_id) {
                return $role;
            }
        }
        return null;
    }

    public function updateRole($role_id, $role_name, $role_description, $role_status)
    {
        foreach ($this->roles as $role) {
            if ($role->role_id == $role_id) {
                $role->role_name = $role_name;
                $role->role_description = $role_description;
                $role->role_status = $role_status;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteRole($role_id)
    {
        foreach ($this->roles as $key => $role) {
            if ($role->role_id == $role_id) {
                unset($this->roles[$key]);
                $this->roles = array_values($this->roles);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getRoleByName($role_name)
    {
        foreach ($this->roles as $role) {
            if ($role->role_name == $role_name) {
                return $role;
            }
        }
        return null;
    }
}
?>