<?php 
session_start();
require_once 'models/role_model.php';
    //create object model

    if(isset($_GET['modul'])) {
        $modul = $_GET['modul'];

    }else{
        $modul = 'dashboard';
    }


    switch($modul) {
        case 'dashboard':
            include 'views/kosong.php';
            break;
        
        case 'role':
            $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
            $obj_role = new modelRole();

            switch($fitur) {
                case 'add':
                    $role_name = $_POST['role_name'];
                    $role_description = $_POST['role_description'];
                    $role_status = $_POST['role_status'];

                    $obj_role->addRole($role_name, $role_description, $role_status);

                    //arahkan ke index.php
                    header("Location: index.php?modul=role");
                    break;
                
                    case 'edit':
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $role = $obj_role->getRoleById($id);
                            include 'views/update.php';
                        }
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
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $obj_role->deleteRole($id);
                        header("Location: index.php?modul=role");
                    }
                    break;

                default:
                    $roles = $obj_role->getAllRoles();
                    include "views/role_list.php";
                // case 'edit':
                //     include "views/role_input.php";
                //     break;
                // default:
                //     include "views/role_list.php";
                //     break;
            }
            break;
            
            break;
    }
?>