<?php
parse_str(file_get_contents('php://input'), $data);
$titre=($data['titre']);
$text=($data['textArticle']);
 var_dump($data);
 
 
if($_SERVER["REQUEST_METHOD"]=='PUT' && !empty($_GET)){    

require './config/connexion.php';

$query=	"UPDATE article SET titre = :titre, textArticle = :textArticle WHERE id = :id";
$sth=$dbh->prepare($query);
$sth->bindValue(':titre', $titre, PDO::PARAM_STR);
$sth->bindValue(':textArticle', $text, PDO::PARAM_STR);
$sth->bindValue(':id',$_GET['id'], PDO::PARAM_INT);
$sth->execute();

$arrayPut=[
    'titre'=> $titre,
    'textArticle'=>$text,
];

header('Content-Type: application/json');
echo json_encode($arrayPut);

}
?>