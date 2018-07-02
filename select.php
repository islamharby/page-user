<?php
$connection = mysqli_connect("localhost" , "root" ,"" ,"crud");

$output  = array();

$query = "SELECT * FROM crudtable";

$ruselt = mysqli_query($connection,$query);

if(mysqli_num_rows($ruselt)>0){
    
    while($row = mysqli_fetch_array($ruselt)){
        
        $output[]= $row;
    }
    
    echo json_encode($output);
}