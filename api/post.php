<?php

$titre =($_POST['titre']);
$text = ($_POST['textArticle']);

if(!empty($titre) && !empty($text)){

    require './config/connexion.php';

$query="INSERT INTO article(titre,textArticle)VALUES(:titre,:textArticle)";
$sth=$dbh->prepare($query);
$sth->bindValue(':titre', $titre, PDO::PARAM_STR);
$sth->bindValue(':textArticle', $text, PDO::PARAM_STR);
$sth->execute();

$arrayPost=[
    'titre'=>$titre,
    'textArticle'=>$text,
];

header('Content-Type: application/json');
echo json_encode($arrayPost);
}

?>