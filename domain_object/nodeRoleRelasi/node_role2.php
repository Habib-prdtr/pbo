<?php 
class role{
    public $role_id;
    public $role_name;
    public $role_description;
    public $role_status;

    public function CetakRole(){
        echo "ID Role: ".$this->role_id."<br>";
        echo "Name Role: ".$this->role_name."<br>";
        echo "Description Role: ".$this->role_description."<br>";
        echo "Status Role: ".$this->role_status."<br>";
    }
}
?>