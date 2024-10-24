<?php 
require 'models/modelsRelasi/role_model2.php';


$obj_role = [];
$obj_role[] = new User(1,"Habib","Raja", 1 ,"Mengendalikan bumi");
$obj_role[] = new User(2,"freya","Ratu", 1 ,"Mengendalikan bumi");
$obj_role[] = new User(3,"freda","Ratu", 0 ,"Mengendalikan bumi");

    foreach($obj_role as $roles){
    echo "ID Role: ".$roles->role_id."<br>";
    echo "Nama Role: ".$roles->role_name."<br>";
    echo "Description Role: ".$roles->role_description."<br>";
    echo "status Role: ".$roles->role_status."<br>";
    echo $roles->user()."<br>";
    echo "<br>";
    }

?>