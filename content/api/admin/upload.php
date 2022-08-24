<?php


$location = '../../assets/img/';


// $filename1 = $_FILES['file']['name'][0];
// $filename2 = $_FILES['file']['name'][1];
// $filename3 = $_FILES['file']['name'][2];

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


// $data = array(); 
// /* Upload file */ 
// if(move_uploaded_file($_FILES['file']['tmp_name'],$location.$filenam1) && move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename2) && move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename3)){
//     $data['name'] = $filename1 . "," $filename2 . "," $filename3; 
    
// } else{ 
//     $data['name'] = "File not uploaded."; 
    
// } 

echo json_encode($data); 
exit;



