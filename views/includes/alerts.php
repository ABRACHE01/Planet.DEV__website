<?php

if(isset($_COOKIE['success'])){
    echo '<div  id="success-alert" class="alert alert-success">'.$_COOKIE['success'].'</div>';
    echo '<script>setTimeout(function(){document.getElementById("success-alert").style.display = "none";}, 2000);</script>';
}
if(isset($_COOKIE['error'])){
    echo '<div id="error-alert" class="alert alert-danger">'.$_COOKIE['error'].'</div>';
    echo '<script>setTimeout(function(){document.getElementById("error-alert").style.display = "none";}, 2000);</script>';
}

if(isset($_COOKIE['info'])){
    echo '<div id="info-alert" class="alert alert-info">'.$_COOKIE['info'].'</div>';
    echo '<script>setTimeout(function(){document.getElementById("info-alert").style.display = "none";}, 2000);</script>';
}
?>



