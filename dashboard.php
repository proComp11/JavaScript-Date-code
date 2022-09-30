<?php 
session_start();

if($_GET['page'] == 'home'){
    echo " WELCOME " .$_SESSION['name'];
}else{
    echo '404 NOT FOUND';
}



?>