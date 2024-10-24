
<?php 
require_once 'domain_object/nodeRoleRelasi/node_role2.php';

class User{
    public $KemampuanModel;
    public $role;
    
    public function __construct($role_id, $role_name, $role_description, $role_status, $KemampuanModel
    )
    {
        $this->role = new role($role_id, $role_name, $role_description, $role_status, $KemampuanModel);
        $this->role->role_id = $role_id;
        $this->role->role_name = $role_name;
        $this->role->role_description = $role_description;
        $this->role->role_status = $role_status;
        $this->KemampuanModel = $KemampuanModel;
    }

    public function CetakUser(){
        $this->role->CetakRole();
        echo "Kemampuan: ".$this->KemampuanModel."<br>";
    }   
}
?>