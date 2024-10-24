<?php 
require 'domain_object/node_role.php';

class User extends Role{
    public $Kemampuan;

    function __construct($role_id, $role_name, $role_description, $role_status, $Kemampuan)
    { 
            parent::__construct($role_id, $role_name, $role_description, $role_status);
            $this->Kemampuan = $Kemampuan;
    }

    public function user(){
        return "Kemampuan: " . $this->Kemampuan;
    }
}


?>