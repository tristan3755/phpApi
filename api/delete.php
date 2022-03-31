<?php


if($_SERVER["REQUEST_METHOD"]=='DELETE' && !empty($_GET)){    
 
require './config/connexion.php';

$query="DELETE FROM article WHERE id=:id";
$sth=$dbh->prepare($query);
$sth->bindValue(':id',$_GET['id'], PDO::PARAM_INT);
$sth->execute();

header('Content-Type: application/json');

echo json_encode('deleted');

}
?>