<?php
require_once 'connection.php';


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$date = date("Y-m-d H:i:s");
$sqlVerif="SELECT * FROM user WHERE mail = '$email'";
$rs = $db->query($sqlVerif);
if ($rs->rowCount()>0)
{
    echo "Désolée vous êtes déjà inscrit à la liste des abonnées";
}else
{
    $sql = "INSERT INTO user VALUES (NULL,'$nom','$prenom','$email','$date')";
    $rs=$db->prepare($sql);
    $rs->execute();
    echo "Vous êtes bien inscrit";
}


