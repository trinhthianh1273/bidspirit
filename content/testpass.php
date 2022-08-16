<?php 

echo md5(strrev('Test@123') . 'Test@123');
echo '<br/>';
echo md5(strrev('User@123') . 'User@123');
echo '<br/>';
echo md5('321$tnahcreM' . 'Merchant@123');
echo '<br/>';

echo md5(strrev('Test@123').'Test@123');
echo '<br/>';


?>