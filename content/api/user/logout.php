<?php
session_start();
$_SESSION['ulogin']=="";
session_unset();
//session_destroy();
?>
<script language="javascript">
    document.location="../content/index.php";
</script>