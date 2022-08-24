<?php

$location = '../../assets/img/';

$countfiles = count($_FILES['file']['name']);
$filename_arr = array();

for ( $i = 0;$i < $countfiles;$i++ ){

    $filename = $_FILES['file']['name'][$i];
   
    // Upload file
    if(move_uploaded_file($_FILES['file']['tmp_name'][$i],$location.$filename)){
    
        $filename_arr[] = $filename;
    }
}
$data = array('name' => $filename_arr);


echo json_encode($data); 
exit;



