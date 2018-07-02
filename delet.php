<?php


$connection = mysqli_connect("localhost","root","","crud");

$data = json_decode(file_get_contents("php://input"));

if($data){
    
   $id = $data->id;

        $query =
        "DELETE FROM `crudtable` WHERE `id`='$id'"; 
    
        if(mysqli_query($connection,$query)){
            echo "Done User Delet";
        }else{
            "Error Delet";
        }
   }

 