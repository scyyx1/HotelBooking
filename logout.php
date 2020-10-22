<?php
    setcookie("username", null, time()-3600,"/");
    setcookie("password", null, time()-3600,"/");
    header('Location: home.php');
?>