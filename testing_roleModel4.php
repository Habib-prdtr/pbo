<?php 
require 'models/role_model4.php';

$model = new UserModel();

$model->AddUser("Habib", "Raja", 1, "mengendalikan bumi");
$model->AddUser("freya", "Ratu", 1, "mengendalikan Raja");
$model->AddUser("freda", "Ratu", 0, "Ratu Mysterius");


foreach  ($model->listUser as $role) {
    $role->CetakUser();
    echo "<br>";
}

?>