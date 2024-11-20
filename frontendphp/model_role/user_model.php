<?php
// require_once 'domain_object/node_user.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontendphp/domain_object/node_user.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontendphp/model_role/role_model.php';
// require_once 'model_role/role_model.php'; // Mengimpor RoleModel

class modelUser {
    private $users = [];
    private $nextId = 1;
    private $roleModel; // Menyimpan instance RoleModel

    public function __construct() {
        $this->roleModel = new modelRole(); // Inisialisasi RoleModel

        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = isset($_SESSION['lastUserId']) ? $_SESSION['lastUserId'] + 1 : 1; // Ambil ID terakhir dari sesi
        } else {
            $this->initialiazeDefaultUser();
            $this->nextId = 4; // Misalnya, jika memiliki 3 user default
        }
    }

    public function initialiazeDefaultUser() {
        // Inisialisasi pengguna default dengan role_id yang valid
        $this->addUser("Danu", "danu123", 1); // Admin
        $this->addUser("Kurniawan", "Kur123", 2); //Super Admin
        $this->addUser("Rahmat", "rahmat123", 3); // user
        $this->addUser("Yono", "yono123", 4); // kasir
    }

    public function addUser($user_username, $user_password, $role_id) {
        // Validasi apakah role_id valid
        if ($this->roleModel->getRoleById($role_id) === null) {
            throw new Exception("Role ID tidak valid.");
        }

        // Menambahkan user baru dengan password yang sudah di-hash
        $user = new users($this->nextId, $user_username, $user_password, $role_id);
        $this->users[] = $user;
        $_SESSION['lastUserId'] = $this->nextId; // Simpan ID terakhir yang digunakan
        $this->nextId++; // Increment ID berikutnya
        $this->saveToSession();
        return true;
    }

    private function saveToSession() {
        $_SESSION['users'] = serialize($this->users);
    }

    public function getAllUser() {
        return $this->users;
    }

    public function getUserById($id) {
        foreach ($this->users as $user) {
            if ($user->user_id == $id) {
                return $user;
            }
        }
        return null;
    }

    public function updateUser($id, $user_name, $user_password, $role_id) {
        // Validasi apakah role_id valid
        if ($this->roleModel->getRoleById($role_id) === null) {
            throw new Exception("Role ID tidak valid.");
        }

        foreach ($this->users as $user) {
            if ($user->user_id == $id) {
                $user->user_name = $user_name;
                $user->user_password = password_hash($user_password, PASSWORD_BCRYPT); // Hash password baru
                $user->role_id = $role_id;
                
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteUser($id) {
        foreach ($this->users as $key => $user) {
            if ($user->user_id == $id) {
                unset($this->users[$key]);
                $this->users = array_values($this->users); // Reset array indeks
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getUserByName($user_name) {
        foreach ($this->users as $user) {
            if ($user->user_name == $user_name) {
                return $user;
            }
        }
        return null;
    }
}
?>
