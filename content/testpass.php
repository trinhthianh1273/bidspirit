<?php 

date_default_timezone_set("Asia/Ho_Chi_Minh");

$date = date_create("Wed Aug 24 2022 19:12:00 GMT+0700");
$date =  date_format($date,"Y-m-d H:i:s");
echo $date . "<br>";
echo getType($date) . "<br>";

$now = date("Y-m-d H:i:s");
echo $now . "<br>";
echo getType($now) . "<br>";

if($now > $date) {
	echo 1;
} else {
	echo 0;
}

echo "<br>";

echo md5(strrev('Test@123') . 'Test@123');
echo '<br/>';
echo md5(strrev('User@123') . 'User@123');
echo '<br/>';
echo md5('321$tnahcreM' . 'Merchant@123');
echo '<br/>';

echo md5(strrev('Test@123').'Test@123');
echo '<br/>';

echo md5(strrev('anh123').'anh123');
echo '<br/>';


?>