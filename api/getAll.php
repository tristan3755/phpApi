<?php

require './config/connexion.php';

$query="SELECT * FROM article ORDER BY titre";
$sth=$dbh->prepare($query);

$sth->execute();
$articles=$sth->fetchAll();

header('Content-Type: application/json');
echo json_encode($articles);
	exit;