<?php
session_start();
session_destroy();
    require_once 'models/role_model.php';

    //create model dan view all
    
    $objRole = new modelRole();
    foreach ($objRole->getAllRoles() as $role){
        echo "id role : ".$role->role_id;
        echo "<br>";
        echo "role name : ".$role->role_name;
        echo "<br>";
        echo "role description : ".$role->role_description;
        echo "<br>";
        echo "role status : ".$role->role_status;
        echo "<br>";
    }
    //add new role
    echo "<hr>";

    echo "========default data role============="."<br>";
    $objRole = new modelRole();
    foreach ($objRole->getAllRoles() as $role){
        echo "id role : ".$role->role_id;
        echo "<br>";
        echo "role name : ".$role->role_name;
        echo "<br>";
        echo "role description : ".$role->role_description;
        echo "<br>";
        echo "role status : ".$role->role_status;
        echo "<br>";
    }
    

        echo "==================testing add role=================";
        echo "<br>";
        $objRole->addRole("new role","new role",1);
        $objRole->addRole(4, "new role", "new role", 1);
        foreach ($objRole->getAllRoles() as $role){
            echo "id role : ".$role->role_id;
            echo "<br>";
            echo "role name : ".$role->role_name;
            echo "<br>";
            echo "role description : ".$role->role_description;
            echo "<br>";
            echo "role status : ".$role->role_status;
            echo "<br>";
        }
        echo "<hr>";

            //update

            echo "========default Update data role============="."<br>";
            $objRole = new modelRole();
            foreach ($objRole->getAllRoles() as $role){
            echo "id role : ".$role->role_id;
            echo "<br>";
            echo "role name : ".$role->role_name;
            echo "<br>";
            echo "role description : ".$role->role_description;
            echo "<br>";
            echo "role status : ".$role->role_status;
            echo "<br>";
        }

        echo "===============update data role================"."<br>";
        $objRole->updateRole(1,"Habib", "new role", 1);
        $objRole->updateRole(2, "Freya", "new role", 1);
        foreach ($objRole->getAllRoles() as $role){
            echo "id role : ".$role->role_id;
            echo "<br>";
            echo "role name : ".$role->role_name;
            echo "<br>";
            echo "role description : ".$role->role_description;
            echo "<br>";
            echo "role status : ".$role->role_status;
            echo "<br>";
        }

        echo "<hr>";
        //delete

        echo "========default Delete data role============="."<br>";
        $objRole = new modelRole();
        foreach ($objRole->getAllRoles() as $role){
        echo "id role : ".$role->role_id;
        echo "<br>";
        echo "role name : ".$role->role_name;
        echo "<br>";
        echo "role description : ".$role->role_description;
        echo "<br>";
        echo "role status : ".$role->role_status;
        echo "<br>"; 
    }

    echo "===============delete data role================"."<br>";
    $objRole->deleteRole(1);
   
    foreach ($objRole->getAllRoles() as $role){
        echo "id role : ".$role->role_id;
        echo "<br>";
        echo "role name : ".$role->role_name;
        echo "<br>";
        echo "role description : ".$role->role_description;
        echo "<br>";
        echo "role status : ".$role->role_status;
        echo "<br>";
        
    }
    

        
    
?>