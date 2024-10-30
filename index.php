<?php 
session_start();
require_once 'models/role_model.php';
require_once 'models/user_model.php';
require_once 'models/barang_model.php'; // Menambahkan model untuk barang

// Tentukan modul yang akan ditampilkan
if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = 'dashboard';
}

switch ($modul) {
    case 'dashboard':
        include 'views/kosong.php';
        break;
    
    // Modul Role
    case 'role':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_role = new modelRole();

        switch ($fitur) {
            case 'add':
                $role_name = $_POST['role_name'];
                $role_description = $_POST['role_description'];
                $role_status = $_POST['role_status'];
                $obj_role->addRole($role_name, $role_description, $role_status);

                header("Location: index.php?modul=role");
                break;

            case 'edit':
                $id = $_GET['id'];
                $role = $obj_role->getRoleById($id);
                include 'views/update.php';
                break;

            case 'update':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id = $_POST['role_id'];
                    $role_name = $_POST['role_name'];
                    $role_description = $_POST['role_description'];
                    $role_status = $_POST['role_status'];

                    $obj_role->updateRole($id, $role_name, $role_description, $role_status);
                    header("Location: index.php?modul=role");
                }
                break;

            case 'delete':
                $id = $_GET['id'];
                $obj_role->deleteRole($id);
                header("Location: index.php?modul=role");
                break;

            default:
                $roles = $obj_role->getAllRoles();
                include "views/role_list.php";
                break;
        }
        break;

    // Modul User
    case 'user':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_user = new UserModel();
        $obj_role = new modelRole(); 
        $roles = $obj_role->getAllRoles();
        var_dump($roles);

        switch ($fitur) {
            case 'add':
                $user_name = $_POST['user_name'];
                $user_password = $_POST['user_password'];
                $role_id = $_POST['role_id']; 
                $obj_user->addUser($user_name, $user_password, $role_id);

                header("Location: index.php?modul=user");
                break;

            case 'edit':
                $id = $_GET['id'];
                $user = $obj_user->getUserById($id);
                include 'views/user_update.php';
                break;

            case 'update':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id = $_POST['user_id'];
                    $user_name = $_POST['user_name'];
                    $user_password = $_POST['user_password'];
                    $role_id = $_POST['role_id'];

                    $obj_user->updateUser($id, $user_name, $user_password, $role_id);
                    header("Location: index.php?modul=user");
                }
                break;

            case 'delete':
                $id = $_GET['id'];
                $obj_user->deleteUser($id);
                header("Location: index.php?modul=user");
                break;

            default:
                $users = $obj_user->getAllUsers();
                include "views/user_list.php";
                break;
        }
        break;

    // Modul Barang
    case 'barang':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_barang = new modelBarang();

        switch ($fitur) {
            case 'add':
                $nama = $_POST['nama'];
                $harga = $_POST['harga'];
                $stok = $_POST['stok'];
                $obj_barang->addBarang($nama, $harga, $stok);

                header("Location: index.php?modul=barang");
                break;

            case 'edit':
                $id = $_GET['id'];
                $barang = $obj_barang->getBarangById($id);
                include 'views/update_barang.php';
                break;

            case 'update':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id = $_POST['id'];
                    $nama = $_POST['nama'];
                    $harga = $_POST['harga'];
                    $stok = $_POST['stok'];

                    $obj_barang->updateBarang($id, $nama, $harga, $stok);
                    header("Location: index.php?modul=barang");
                }
                break;

            case 'delete':
                $id = $_GET['id'];
                $obj_barang->deleteBarang($id);
                header("Location: index.php?modul=barang");
                break;

            default:
                $barangs = $obj_barang->getAllBarangs();
                include "views/barang_list.php";
                break;
        }
        break;
}
?>
