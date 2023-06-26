<?php
$db = new PDO('mysql:host=localhost;dbname=newsletter','root','');
if (!$db)
{
    die();
}
