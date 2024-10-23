<?php 
require_once(__DIR__ . '/../domain_object/node_role3.php');

class User {
    public $KemampuanModel;
    public $role;

    public function __construct($human,$KemampuanModel)
    {
        $this->role = $human;
        $this->KemampuanModel = $KemampuanModel;
    }

    public function CetakUser(){
        $this->role->CetakRole();
        echo "Kemampuan: ".$this->KemampuanModel."<br>";
    }
}

class UserModel {
    public $listUser = [];

    public function AddUser($role_name, $role_description, $role_status, $Kemampuan){
        $id = count($this->listUser) + 1;
        $role = new Role($id, $role_name, $role_description, $role_status);
        $this->listUser[] = new User($role, $Kemampuan);
    }
}
?>