<?php

$connection = mysqli_connect("localhost","root","","crud");

$data = json_decode(file_get_contents("php://input"));

if($data){

   $name =  mysqli_real_escape_string($connection,$data->name);
   $age  = mysqli_real_escape_string($connection,$data->age);
   $email = mysqli_real_escape_string($connection,$data->email);
   $bName = $data->bName;

   if($bName == 'Add'){
        $query =
        "INSERT INTO `crudtable` ( `name` , `age` , `email` )
        VALUE('$name',' $age',' $email')"; 
    
        if(mysqli_query($connection,$query)){
            echo "Done User Add";
        }else{
            "Error Add";
        }
   }

   if($bName == 'Update'){

    $id = $data->id;

    $query =
    "UPDATE `crudtable` SET `name`='$name',`age`='$age',`email`='$email' WHERE `id`='$id'"; 

    if(mysqli_query($connection,$query)){
        echo "Done User Updated";
    }else{
        "Error Updated";
    }
}

   
   

} 