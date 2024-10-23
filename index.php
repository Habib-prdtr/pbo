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