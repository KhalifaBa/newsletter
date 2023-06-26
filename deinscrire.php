<?php
require_once 'connection.php';


$email = $_POST['email'];



    $sql = "DELETE FROM user WHERE mail ='$email'";
    $rs=$db->prepare($sql);
    $rs->execute();
    echo "Vous avez bien été désabonné";



