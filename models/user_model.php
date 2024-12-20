<?php 
require_once 'domain_object/node_user.php';
require_once 'models/role_model.php'; // Pastikan Anda mengimpor RoleModel

class UserModel {
    private $users = [];
    private $nextUserId = 1;
    private $roleModel; // Instance dari RoleModel

    public function __construct() {// Pastikan session dimulai
        $this->roleModel = new modelRole(); // Inisialisasi RoleModel

        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            if (!empty($this->users)) {
                $lastUser  = end($this->users);
                $this->nextUserId = $lastUser ->user_id + 1;
            }
        } else {
            $this->initializeDefaultUsers();
        }
    }

    private function initializeDefaultUsers() {
        // Menggunakan ID role dari RoleModel
        $this->addUser ('Habib', 'habib123', 1); // Admin
        $this->addUser ('Freya', 'freya123', 2); // User
        $this->addUser ('Raiden', 'raiden123', 2); // User
        $this->addUser ('Freda', 'freda123', 3); // Kasir
        $this->addUser ('Rimuru', 'rimuru123', 3); // Kasir
        $this->addUser ('Gilgamesh', 'gilgamesh123', 4); // Kasir
    }

    public function addUser ($user_name, $user_password, $role_id) {
        // Validasi apakah role_id valid
        if ($this->roleModel->getRoleById($role_id) === null) {
            throw new Exception("Role ID tidak valid.");
        }

        $user = new NodeUser ($this->nextUserId, $user_name, password_hash($user_password, PASSWORD_BCRYPT), $role_id);
        $this->users[] = $user;
        $this->nextUserId++;
        $this->saveToSession();
    }

    private function saveToSession() {
        $_SESSION['users'] = serialize($this->users);
    }

    public function getAllUsers() {
        return $this->users;
    }

    public function getUserById($user_id) {
        foreach ($this->users as $user) {
            if ($user->user_id == $user_id) {
                return $user;
            }
        }
        return null;
    }

    public function updateUser ($user_id, $user_name, $user_password, $role_id) {
        // Validasi apakah role_id valid
        if ($this->roleModel->getRoleById($role_id) === null) {
            throw new Exception("Role ID tidak valid.");
        }

        foreach ($this->users as $user) {
            if ($user->user_id == $user_id) {
                $user->user_name = $user_name;
                $user->user_password = password_hash($user_password, PASSWORD_BCRYPT);
                $user->role_id = $role_id; // Update ID role
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteUser ($user_id) {
        foreach ($this->users as $key => $user) {
            if ($user->user_id == $user_id) {
                unset($this->users[$key]);
                $this->users = array_values($this->users);
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

    public function getAllCustomers() {
        $customers = [];
        foreach ($this->users as $user) {
            // Role ID 2 adalah User Customer
            if ($user->role_id == 2) { 
                $customers[] = $user;
            }
        }
        return $customers;
    }
}
?>