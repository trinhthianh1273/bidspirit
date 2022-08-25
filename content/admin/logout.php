<?php
session_start();

$_SESSION['alogin']=="";
// session_unset();
//session_destroy();

$_SESSION['errmsg']="You have successfully logout";

echo json_encode($_SESSION);
?>
<script language="javascript">
    document.location="login.php";
</script>