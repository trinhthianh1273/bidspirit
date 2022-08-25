<?php

session_start();

$location = '../../assets/img/';

$countfiles = count($_FILES['file']['name']);
$filename_arr = array();

for ( $i = 0;$i < $countfiles;$i++ ){

    $filename = utf8_encode($_FILES['file']['name'][$i]);
   
    // Upload file
    if(move_uploaded_file($_FILES['file']['tmp_name'][$i],$location.$filename)){
    
        $filename_arr[] = $filename;
    }
}
$data = array('name' => $filename_arr);

$_SESSION['productImg1'] = $data['name'][0];
$_SESSION['productImg2'] = $data['name'][1];
$_SESSION['productImg3'] = $data['name'][2];




echo json_encode($data); 
exit;



